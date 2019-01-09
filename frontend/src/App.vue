<template lang="pug">
  #app
    router-view
</template>

<script>
export default {
  name: 'App',
}
</script>

<style lang="scss">
@import './styles/main';

html,
body {
  height: 100%;
}

#app {
  min-height: 100%;
  // background: $navy;
}
</style>
