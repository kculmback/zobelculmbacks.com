<template lang="pug">
  .invite.pt-6.px-4
    p.text-lg.text-center(v-if="loading") Getting invite information...
    p.text-red-darker.text-center(v-else-if="error") Could not retrieve invite, please reload and try again. If the issue persists, contact Kasey or Kayla.
    template(v-else)
      h1.font-hand.text-4xl.text-center Hello#[span(v-if="name && name.length")  {{ name }}]!
      .my-6.max-w-sm.mx-auto(v-if="success || alreadyRsvped")
        p.text-center.text-lg.mb-3(:class="{ 'text-green-dark': success }") #[span(v-if="success") Success!] Thank you for RSVPing!
        p.text-center.text-lg.mb-6 If you have any song recommendations for us, please feel free to fill out and submit the form below.
        songs
      template(v-else)
        p.text-lg.text-center.my-6.max-w-sm.mx-auto Please select which invited guests will be attending and click submit to RSVP.
        .my-4.max-w-xs.mx-auto
          form.invite__form(@submit.prevent="handleSubmit")
            .invite__guest.flex.items-center.mb-2(v-for="({ name, rsvp, id }, index) in guests")
              input(ref="inputs" type="checkbox" :checked="rsvp" :id="id" :data-id="id" @input="handleInput(index, $event)")
              label.ml-4.text-lg(:for="id") {{ name }}
            .invite__guest.flex.items-center.mb-2
              input(ref="inputs" type="checkbox" :checked="allRsvpNo" id="all" @input="updateAll")
              label.ml-4.text-lg(for="all") None of us will be able to attend
            button.block.text-white.px-4.py-3.rounded.mt-4(
              type="submit"
              :disabled="submitting"
              :class="btnClasses"
            ) {{ submitting ? 'Submitting...' : 'Submit' }}
            p.my-4.text-red-darker.text-center(v-if="submitError") Could not submit RSVP, please try again. If the issue persists, contact Kasey or Kayla.
</template>

<script>
import debug from 'debug'
import { mapActions, mapState } from 'vuex'

import Songs from '../components/Songs'

const log = debug('view:Invite')

export default {
  name: 'Invite',
  data () {
    return {
      loading: true,
      error: false,
      submitting: false,
      submitError: false,
      success: false,
      guests: [],
      alreadyRsvped: false,
    }
  },
  computed: {
    ...mapState('rsvp', ['name']),
    btnClasses () {
      return {
        'bg-blue': !this.submitting,
        'hover:bg-blue-dark': !this.submitting,
        'bg-grey': this.submitting,
        'hover:bg-grey': this.submitting,
        'pointer-events-none': this.submitting,
      }
    },

    allRsvpNo () {
      return this.guests.every(guest => guest.rsvp === false || guest.rsvp === 0)
    },
  },
  methods: {
    ...mapActions('rsvp', ['getInvite', 'rsvp']),
    handleInput (index, event) {
      this.guests[index]['rsvp'] = event.target.checked
    },

    updateAll (event) {
      if (event.target.checked === true) {
        this.guests.forEach(guest => { guest.rsvp = false })
      }
    },

    handleSubmit () {
      if (this.submitting || this.loading) return

      this.submitting = true
      this.submitError = false
      this.success = false

      const rsvps = this.guests.map(guest => {
        return { id: guest.id, rsvp: !!guest.rsvp }
      })

      this.rsvp({ rsvps, id: this.$route.params.invite_id })
        .then(() => { this.success = true })
        .catch(error => {
          log(error)
          this.submitError = true
        })
        .finally(() => { this.submitting = false })
    },

    checkIfAlreadyRsvped () {
      this.alreadyRsvped = this.guests.every(guest => guest.rsvp !== null)
    },
  },
  created () {
    this.getInvite(this.$route.params.invite_id)
      .then(guests => {
        this.guests = guests
        this.checkIfAlreadyRsvped()
      })
      .catch(error => {
        log(error)
        this.error = true
      })
      .finally(() => {
        this.loading = false
      })
  },
  components: { Songs },
}
</script>

<style lang="postcss" scoped>
.invite {}
</style>
