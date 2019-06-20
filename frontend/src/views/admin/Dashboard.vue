<template lang="pug">
  .dashboard
    .dashboad__loading(v-if="loading")
      p Loading...
    template(v-else-if="invites.length")
      .dashboard__invites
        .invite.border-grey-lighter.border.rounded.p-4.shadow-md.mb-4(v-for="{ guests, id } in invites")
          .invite__guests.flex.justify-between.items-center
            div
              span.text-grey-dark(v-for="({ name }, index) in guests") {{ name }}{{ index + 1 === guests.length ? '' : ', ' }}
            router-link.bg-blue.text-white.px-2.py-3.rounded(:to="{ name: 'Invite', params: { id } }" class="hover:bg-blue-dark hover:text-white") See Invite
      .dashboard__pagination.flex.justify-center.pt-4
        router-link.bg-blue.text-white.px-4.py-3.rounded.mr-4(
          :to="{ name: 'Dashboard', query: { page: page - 1 } }"
          v-if="page !== 1"
          class="hover:bg-blue-dark hover:text-white"
        ) Previous
        router-link.bg-blue.text-white.px-4.py-3.rounded(
          :to="{ name: 'Dashboard', query: { page: nextPageNumber } }"
          v-if="page !== nextPageNumber"
          class="hover:bg-blue-dark hover:text-white"
        ) Next
</template>

<script>
import { mapActions, mapState } from 'vuex'
// import debug from 'debug'

// const log = debug('component:Dashboard')

export default {
  name: 'Dashboard',
  data () {
    return {
      loading: false,
    }
  },
  watch: {
    $route (route) {
      this.update(route)
    },
  },
  created () {
    this.update()
  },
  computed: {
    ...mapState('admin', ['invites', 'page', 'nextPage']),
    nextPageNumber () {
      return this.nextPage !== null ? this.page + 1 : this.page
    },
  },
  methods: {
    ...mapActions('admin', ['getInvites']),
    async update (newRoute) {
      const route = newRoute || this.$route
      this.loading = true
      await this.getInvites({ page: route.query.page })
      this.loading = false
    },
  },
}
</script>

<style lang="postcss" scoped>
.dashboard {}
</style>
