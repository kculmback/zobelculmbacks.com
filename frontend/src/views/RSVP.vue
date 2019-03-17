<template lang="pug">
  .rsvp.pt-6
    h1.text-center RSVP
    .max-w-md.mx-auto
      p.text-center Coming soon...
</template>

<script>
// import debug from 'debug'

import metadata from '../helpers/metadata.js'

// const log = debug('view:RSVP')

export default {
  name: 'RSVP',
  metaInfo: {
    title: metadata.title.rsvp,
    meta: [
      { name: 'description', content: metadata.description.rsvp },
      { property: 'og:title', content: metadata.title.rsvp },
      { property: 'og:description', content: metadata.description.rsvp },
      { property: 'twitter:title', content: metadata.title.rsvp },
      { property: 'twitter:description', content: metadata.description.rsvp },
    ],
  },
}
</script>

<style lang="scss" scoped>
.rsvp {}
</style>
