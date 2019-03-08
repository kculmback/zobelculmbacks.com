<template lang="pug">
  #app.font-sans.font-light.text-base.mb-32
    app-nav.z-10
    .main.pt-16.z-0.relative
      router-view
</template>

<script>
import AppNav from '@/components/AppNav'

export default {
  name: 'App',
  components: {
    AppNav,
  },
}
</script>
