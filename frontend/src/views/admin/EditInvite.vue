<template lang="pug">
  .edit.max-w-md.w-full.mx-auto.border-grey-lighter.border.rounded.p-4.shadow-md
    h1.text-center.text-2xl.mb-6 Invite Info
    .edit__guest.mb-2(v-for="guest in guests")
      span.inline-block.mr-2 {{ guest.name }}
      attending.inline.mr-2.w-4.h-4(v-if="!!guest.rsvp")
      span.inline.mr-2.w-3.h-3(v-else-if="guest.rsvp === null") __
      not-attending.inline.mr-2.w-3.h-3(v-else)
</template>

<script>
import { mapActions } from 'vuex'
// import debug from 'debug'

// const log = debug('view:Edit')

export default {
  name: 'Edit',
  data () {
    return {
      guests: [],
      loading: false,
    }
  },
  async created () {
    this.loading = true
    this.getInvite(this.$route.params.id)
      .then(guests => {
        this.guests = guests
      })
      .finally(() => {
        this.loading = false
      })
  },
  methods: {
    ...mapActions('admin', ['getInvite']),
  },
}
</script>

<style lang="postcss" scoped>
.invite {}
</style>
