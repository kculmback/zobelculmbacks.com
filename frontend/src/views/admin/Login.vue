<template lang="pug">
  .login
    h1.text-center.mb-6 Login
    form.login__form.border-grey-lighter.border.rounded.p-4.mb-6.max-w-md.mx-auto(@submit.prevent="handleSubmit")
      .login__email.mb-4
        label.login__label.mb-2.block Email
        input.login__input.rounded.shadow-md.w-full.px-2.py-4.border.border-grey-lighter(v-model="email" required type="email" name="email")
      .login__artist.mb-8
        label.login__label.mb-2.block Password
        input.login__input.rounded.shadow-md.w-full.px-2.py-4.border.border-grey-lighter(v-model="password" required type="password" name="password")
      button.songs__add.bg-blue.text-white.px-2.py-3.rounded.w-full(type="submit" class="hover:bg-blue-dark hover:text-white") {{ submitting ? 'Submitting...' : `Submit` }}
</template>

<script>
import { mapActions } from 'vuex'
// import debug from 'debug'

import config from '../../config'

// const log = debug('view:Login')

export default {
  name: 'Login',
  data () {
    return {
      email: config.get('isLocal') ? 'kasey.culmback@gmail.com' : '',
      password: config.get('isLocal') ? 'password' : '',
      submitting: false,
    }
  },
  methods: {
    ...mapActions('admin', ['login']),
    handleSubmit () {
      this.login({
        email: this.email,
        password: this.password,
      }).then(() => {
        this.$router.push({ name: 'Rsvps' })
      })
    },
  },
}
</script>

<style lang="postcss" scoped>
.login {}
</style>
