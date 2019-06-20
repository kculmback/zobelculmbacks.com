<template lang="pug">
  #app.font-sans.font-light.text-base.mb-32.px-6.pt-24.pb-16
    app-nav
    router-view
</template>

<script>
import AppNav from '@/components/admin/AppNav'

export default {
  name: 'App',
  mounted () {},
  methods: {},
  components: { AppNav },
}
</script>
