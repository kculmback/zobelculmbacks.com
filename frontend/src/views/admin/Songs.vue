<template lang="pug">
  .songs.max-w-xl.mx-auto
    .songs__loading(v-if="loading")
      p Loading...
    template(v-else-if="songs.length")
      .songs__song-list
        .songs__song.border-grey-lighter.border.rounded.p-4.shadow-md.mb-4(v-for="{ name, artist, invite } in songs")
          .flex.flex-wrap
            .songs__name(class="w-1/2 md:w-1/3")
              p.font-bold.text-xs.text-grey-darker.mb-1 Song Name
              p {{ name }}
            .songs__artist(class="w-1/2 md:w-1/3")
              p.font-bold.text-xs.text-grey-darker.mb-1 Song Artist
              p {{ artist }}
            .songs__guest(class="w-full md:w-1/3 mt-4 md:mt-0")
              p.font-bold.text-xs.text-grey-darker.mb-1 Guest
              p(v-if="invite") {{ invite.guests[0].name }}
      .songs__pagination.flex.justify-center.pt-4
        router-link.btn.mr-4(
          :to="{ name: 'Songs', query: { page: page - 1 } }"
          v-if="page !== 1"
        ) Previous
        router-link.btn(
          :to="{ name: 'Songs', query: { page: nextPageNumber } }"
          v-if="page !== nextPageNumber"
        ) Next
</template>

<script>
// import debug from 'debug'
import axios from '../../helpers/axios'

// const log = debug('view:Songs')

export default {
  name: 'Songs',
  data () {
    return {
      songs: [],
      loading: false,
      page: null,
      nextPage: null,
    }
  },
  watch: {
    $route (route) {
      this.update()
    },
  },
  created () {
    this.update()
  },
  computed: {
    nextPageNumber () {
      return this.nextPage !== null ? this.page + 1 : this.page
    },
  },
  methods: {
    async update (newRoute) {
      const route = newRoute || this.$route
      this.loading = true
      await this.getSongs({ page: route.query.page })
      this.loading = false
    },
    getSongs ({ take, page }) {
      return new Promise((resolve, reject) => {
        axios
          .get('songs', {
            params: {
              take,
              page,
            },
          })
          .then(response => {
            this.songs = response.data.data
            this.page = response.data.current_page
            this.nextPage = response.data.next_page_url
            resolve()
          })
          .catch(error => reject(error))
      })
    },
  },
}
</script>

<style lang="postcss" scoped>
.songs {}
</style>
