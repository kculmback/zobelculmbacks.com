<template lang="pug">
  #app.font-sans.font-light.text-base.mb-32
    app-nav.z-10
    .main.pt-16.z-0.relative
      router-view
</template>

<script>
import { mapActions } from 'vuex'

import AppNav from '@/components/AppNav'

export default {
  name: 'App',
  mounted () {
    const descriptions = Array.from(document.querySelectorAll('[name=description]'))
    const ogTitle = Array.from(document.querySelectorAll('[property="og:title"]'))
    const ogDescription = Array.from(document.querySelectorAll('[property="og:description"]'))
    const twitterTitle = Array.from(document.querySelectorAll('[name="twitter:title"]'))
    const twitterDescription = Array.from(document.querySelectorAll('[name="twitter:description"]'))
    const all = [...descriptions, ...ogTitle, ...ogDescription, ...twitterTitle, ...twitterDescription]
    const filtered = all.filter((node) => !node.dataset.vueMeta)

    filtered.forEach(node => {
      node.parentNode.removeChild(node)
    })
  },
  methods: {
    ...mapActions('stripe', ['setHandler', 'setToken', 'setStripeLoaded']),
  },
  components: {
    AppNav,
  },
}
</script>
