<template lang="pug">
  .rsvps.max-w-md.w-full.mx-auto
    .rsvps__counts.border-grey-lighter.border.rounded.p-4.shadow-md.text-center.flex.justify-between.mb-8
      .rsvps__count.rsvps__coming.text-green-dark
        span Coming
        br
        span {{ coming }}
      .rsvps__count.rsvps__not-coming.text-red-dark
        span Not Coming
        br
        span {{ notComing }}
      .rsvps__count.rsvps__hasnt-responded
        span Hasn't Responded
        br
        span {{ hasntResponded }}
    .rsvps__counts.border-grey-lighter.border.rounded.p-4.shadow-md
      form(@submit.prevent="getRsvps")
        select(ref="selectStatus" required)
          option(disabled selected value="false") Get RSVPs
          option(value="yes") Coming
          option(value="no") Not Coming
          option(value="hasnt") Hasn't Responded
        button(type="submit") Get RSVPs
      .rsvps__list.pt-4(v-if="guests")
        .rsvps__guest.mb-3(v-for="guest in guests")
          span {{ guest.name }}

</template>

<script>
// import debug from 'debug'
import axios from '../../helpers/axios'

// const log = debug('view:Rsvps')

export default {
  name: 'Rsvps',
  data () {
    return {
      coming: 0,
      notComing: 0,
      hasntResponded: 0,
      guests: null,
    }
  },
  created () {
    axios
      .get('guests/count', {
        params: {
          status: 'yes',
        },
      })
      .then(response => {
        this.coming = response.data.count
      })
    axios
      .get('guests/count', {
        params: {
          status: 'no',
        },
      })
      .then(response => {
        this.notComing = response.data.count
      })
    axios
      .get('guests/count', {
        params: {
          status: 'hasnt',
        },
      })
      .then(response => {
        this.hasntResponded = response.data.count
      })
  },
  methods: {
    getRsvps () {
      const status = this.$refs.selectStatus.value
      if (status === 'false') {
        return
      }

      axios
        .get('guests', {
          params: { status },
        })
        .then(response => {
          this.guests = response.data.guests
        })
    },
  },
}
</script>

<style lang="postcss" scoped>
.rsvps {}
</style>
