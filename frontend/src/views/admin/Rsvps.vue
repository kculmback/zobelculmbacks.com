<template lang="pug">
  .rsvps.max-w-md.w-full.mx-auto
    .rsvps__counts.border-grey-lighter.border.rounded.p-4.shadow-md.text-center.flex.flex-col.justify-between.mb-8(class="md:flex-row")
      .rsvps__count.rsvps__coming.text-green-dark.flex.mb-2.items-center(class="md:flex-col md:mb-0")
        span.mr-2(class="md:mr-0") Coming
        span {{ coming }}
      .rsvps__count.rsvps__not-coming.text-red-dark.flex.mb-2.items-center(class="md:flex-col md:mb-0")
        span.mr-2(class="md:mr-0") Not Coming
        span {{ notComing }}
      .rsvps__count.rsvps__hasnt-responded.flex.items-center(class="md:flex-col md:mb-0")
        span.mr-2(class="md:mr-0") Hasn't Responded
        span {{ hasntResponded }}
    .rsvps__counts.border-grey-lighter.border.rounded.p-4.shadow-md
      form(@submit.prevent="getRsvps")
        select.mr-4.py-2.px-3.rounded.bg-grey-lighter(ref="selectStatus" required)
          option(disabled selected value="false") Select Status
          option(value="yes") Coming
          option(value="no") Not Coming
          option(value="hasnt") Hasn't Responded
        button.btn(type="submit") Get RSVPs
      .rsvps__list.pt-4(v-if="invites")
        template(v-for="(guests, index) in invites")
          ul.rsvps__invite.list-reset(:class="{ 'mb-3': index + 1 !== invites.length }")
            li(v-for="guest in guests") {{ guest.name }}
          hr.border(v-if="index + 1 !== invites.length")

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
      invites: null,
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
          this.invites = response.data.invites
        })
    },
  },
}
</script>

<style lang="postcss" scoped>
.rsvps {}
</style>
