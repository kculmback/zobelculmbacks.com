<template lang="pug">
  form.stripe
    .flex.w-full.mb-4.flex-wrap(class="sm:flex-no-wrap")
      .flex-grow.w-full.mb-4(class="sm:w-auto sm:mb-0")
        span.mb-1.block What would you like this gift to go towards?
        label.flex.items-center.mb-1
          input.mr-2(type="radio" name="title" value="honeymoon" v-model="gift")
          | Honeymoon
        label.flex.items-center.mb-1
          input.mr-2(type="radio" name="title" value="house" v-model="gift")
          | House
        label.flex.items-center.mb-1
          input.mr-2(type="radio" name="title" value="other" v-model="gift")
          | Other
        .pt-2(v-if="gift === `other`")
          label.mb-1.block Other:
          input.shadow.rounded.py-2.px-1.border.border-grey-lightest(type="text" v-model="other")
      .flex-grow.w-full(class="sm:w-auto")
        label.block.mb-1(for="amount") Gift Amount
        span $&nbsp;
        input.stripe__amount.shadow.rounded.py-2.px-1.border.border-grey-lightest(type="number" id="amount" v-model="amount")
    label.block.mb-1(for="note") Note
    textarea.w-full.shadow.rounded.py-2.px-1.border.border-grey-lightest(id="note" rows="5" v-model="note" placeholder="Optional note about the gift!")
    .my-5.rounded.shadow.bg-red-lighter.border.border-red-dark.text-red-darker.p-3(v-if="errors")
      p.mb-2 Whoops! Something went wrong.
      form-errors(:formErrors="errors")
    button.stripe__submit.bg-blue-dark.text-white.rounded.shadow.px-6.py-3.transition-bg-250.font-hand.text-xl.block.my-4.mx-auto(
      type="submit"
      ref="submit"
      class="hover:bg-blue-light"
      :disabled="btnDisabled"
      @click.prevent="handleSubmit"
    ) {{ submitting ? 'Submitting...' : 'Submit!' }}
</template>

<script>
import debug from 'debug'
import { mapActions } from 'vuex'
import axios from '../helpers/axios.js'
import config from '../config'

import FormErrors from '@/components/FormErrors'

const log = debug('component:Stripe')

export default {
  name: 'Stripe',
  data () {
    return {
      amount: 40.00,
      gift: 'honeymoon',
      other: null,
      note: '',
      stripe: null,
      errors: null,
      submitting: false,
    }
  },
  computed: {
    btnDisabled () {
      return !this.stripe || this.submitting
    },
  },
  created () {
    if (window.Stripe) {
      this.initStripe()
    } else {
      const waitUntilStripeExists = setInterval(() => {
        if (window.Stripe) {
          this.initStripe()
          clearInterval(waitUntilStripeExists)
        }
      }, 50)
    }
  },
  mounted () {
  },
  methods: {
    ...mapActions('stripe', ['submitStripe']),
    initStripe () {
      this.stripe = window.Stripe(
        config.get('stripe'),
        { betas: ['checkout_beta_4'] },
      )
    },

    handleSubmit () {
      this.handleError(null)
      this.submitting = true

      const amount = parseFloat(this.amount)

      if (!this.validate(amount)) return

      axios.post('/api/stripe', {
        amount: Math.round(amount * 100),
        gift: this.gift,
        note: this.note,
        other: this.other,
      })
        .then(this.submitCheckout)
        .catch(error => {
          this.submitting = false
          log(error.response)
          if (error.response) {
            if (error.response.status >= 500) {
              this.handleError('Could not submit to Stripe.')
              return
            } else if (error.response.data.errors) {
              this.handleError(error.response.data.errors)
              return
            } else if (error.response.data.message) {
              this.handleError(error.response.data.message)
              return
            }
          }
          this.handleError('Could not submit to Stripe.')
        })
    },

    submitCheckout (response) {
      this.stripe.redirectToCheckout({
        sessionId: response.data.id,
      })
        .then(response => {
          const message = response && response.error && response.error.message
            ? response.error.message
            : 'Could not submit to Stripe.'

          this.handleError(message)
          this.submitting = false
        })
    },

    handleError (message) {
      this.errors = message
      this.submitting = false
    },

    validate (amount) {
      if (isNaN(amount)) {
        this.handleError('Please enter a valid amount.')
        return false
      }

      if (amount < 5) {
        this.handleError('Unfortunately we cannot process gifts of less than $5.00.')
        return false
      }

      if (!this.gift) {
        this.handleError('Please specify a gift.')
        return false
      }

      if (this.gift === 'other' && !this.other) {
        this.handleError(`Please fill in the 'other' field.`)
        return false
      }

      return true
    },
  },
  components: { FormErrors },
}
</script>

<style lang="postcss" scoped>
.stripe {
  &__submit {
    &:disabled {
      @apply bg-grey-darker;
      @apply cursor-not-allowed;
      @apply pointer-events-none;
    }
  }
}
</style>
