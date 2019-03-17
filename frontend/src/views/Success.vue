<template lang="pug">
  .success.pt-6.px-6
    h1.text-center.mb-4 Success!
    p.text-center Thank you for your gift! A receipt will be sent to the email you specified during payment.
</template>

<script>
// import debug from 'debug'

import metadata from '../helpers/metadata.js'

// const log = debug('view:Success')

export default {
  name: 'Success',
  metaInfo: {
    title: metadata.title.default,
    meta: [{ name: 'description', content: metadata.description.default }],
  },
}
</script>

<style lang="postcss" scoped>
.success {}
</style>
