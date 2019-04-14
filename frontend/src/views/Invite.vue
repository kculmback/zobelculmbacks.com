<template lang="pug">
  .invite.pt-6.px-4
    p.text-lg.text-center(v-if="loading") Getting invite information...
    p.text-red-darker.text-center(v-else-if="error") Could not retrieve invite, please reload and try again. If the issue persists, contact Kasey or Kayla.
    template(v-else)
      h1.font-hand.text-4xl.text-center Hello#[span(v-if="name && name.length")  {{ name }}]!
      .my-4.max-w-xs.mx-auto
        p.text-center.text-green-dark(v-if="success") Success! Thank you for RSVPing!
        form.invite__form(v-else @submit.prevent="handleSubmit")
          .invite__guest.flex.items-center.mb-2(v-for="({ name, rsvp, id }, index) in guests")
            input(ref="inputs" type="checkbox" :checked="rsvp" :id="id" :data-id="id" @input="handleInput(index, $event)")
            label.ml-4.text-lg(:for="id") {{ name }}
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
  },
  methods: {
    ...mapActions('rsvp', ['getInvite', 'rsvp']),
    handleInput (index, event) {
      this.guests[index]['rsvp'] = event.target.checked
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
  },
  created () {
    this.getInvite(this.$route.params.invite_id)
      .then(guests => { this.guests = guests })
      .catch(error => {
        log(error)
        this.error = true
      })
      .finally(() => { this.loading = false })
  },
}
</script>

<style lang="postcss" scoped>
.invite {}
</style>
