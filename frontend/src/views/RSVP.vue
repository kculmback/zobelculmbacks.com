<template lang="pug">
  .rsvp.pt-6
    h1.text-center RSVP
    .max-w-md.mx-auto.my-6
      input.rounded.shadow-md.w-full.px-2.py-4.border.border-grey-lighter(:value="search" @input="handleInput" placeholder="Search")
    .max-w-md.mx-auto
      p.text-center.mb-6.text-red-dark(v-if="error") Error while submitting search. Please try again! If the issue persists, please contact Kasey or Kayla.
      p.text-center(v-if="loading") Loading...
      template(v-else-if="searchResults.length")
        .rounded.shadow-md.px-4.py-6.flex.items-center.justify-between.mb-6(v-for="{ name, invite_id } in searchResults")
          p.block {{ name }}
          a.rsvp__btn.bg-blue.block.text-white.px-2.py-3.rounded(:href="`/rsvp/${invite_id}`" @click.prevent="goToInvite(name, invite_id)" class="hover:bg-blue-dark hover:text-white") See Invite & RSVP
      p.text-center(v-else) No results.
</template>

<script>
import debug from 'debug'
import { mapActions, mapState } from 'vuex'

import metadata from '../helpers/metadata.js'
import { debounce } from '../helpers/misc.js'

const log = debug('view:RSVP')

export default {
  name: 'RSVP',
  data () {
    return {
      search: '',
      loading: false,
      searchCounter: 0,
      error: false,
    }
  },
  computed: {
    ...mapState('rsvp', ['searchResults']),
  },
  methods: {
    ...mapActions('rsvp', ['submitSearch', 'clearSearchResults', 'setName']),
    handleInput: debounce(function (event) {
      const value = event.target.value
      this.search = value
      this.error = false

      if (value.length === 0) {
        this.clearSearchResults()
      } else if (value.length > 2) {
        this.loading = true
        this.handleSearch()
      }
    }, 250),
    handleSearch () {
      this.submitSearch(this.search)
        .then(() => { this.loading = false })
        .catch(this.handleError)
    },
    handleError (error) {
      log(error)
      if (
        error &&
        error.response &&
        error.response.status === 408 &&
        this.searchCounter < 2
      ) {
        this.searchCounter += 1
        this.handleSearch()
      } else {
        this.searchCounter = 0
        this.error = true
        this.loading = false
      }
    },
    goToInvite (name, id) {
      this.setName(name)
      this.$router.push(`/rsvp/${id}`)
    },
  },
  metaInfo: {
    title: metadata.title.rsvp,
    meta: [
      { name: 'description', content: metadata.description.rsvp },
      { property: 'og:title', content: metadata.title.rsvp },
      { property: 'og:description', content: metadata.description.rsvp },
      { property: 'twitter:title', content: metadata.title.rsvp },
      { property: 'twitter:description', content: metadata.description.rsvp },
    ],
  },
}
</script>

<style lang="postcss" scoped>
.rsvp {
  &__btn {
    transition: background 250ms;
  }
}
</style>
