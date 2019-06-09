<template lang="pug">
  .registry.pt-6.px-6
    h1.text-center.mb-4 Registries
    .max-w-md.mx-auto
      p.mb-2 We appreciate your thoughtfullness in wanting to get us a gift! We know many of you may be traveling and we would like to provide a few different options for gift purchases.
      p.mb-2 If you'd like, you can choose to give a cash gift specifically for our house or honeymoon fund. If you want to go that route, you can submit payment online via Stripe (form below) or checks/cash are great too! In case you like giving physical gifts, we have signed up for a couple of different registries.
      .py-8
        h2.text-center.mb-4.text-3xl Custom Gift
        stripe
      .text-center.py-8
        h2.text-center.mb-4.text-3xl Mailing Address
        p 1117 W Mansfield
        p Spokane, WA 99205
      .py-8.text-center
        h2.text-center.text-3xl Online Registries
        .flex.items-center.justify-center.flex-wrap(class="sm:flex-no-wrap")
          .mx-4.my-4.w-full(class="sm:w-auto")
            a(href="http://tgt.gifts/zobelculmbacks" target="_blank" rel="noopener noreferrer nofollower")
              target-logo.w-auto.h-20
          .mx-4.my-4.w-full(class="sm:w-auto")
            a(href="https://smile.amazon.com/wedding/share/zobelculmbacks" target="_blank" rel="noopener noreferrer nofollower")
              amazon-logo.w-auto.h-12
</template>

<script>
// import debug from 'debug'

import Stripe from '@/components/Stripe'
import TargetLogo from '@/assets/logos/target.svg'
import AmazonLogo from '@/assets/logos/amazon.svg'

import metadata from '../helpers/metadata.js'

// const log = debug('view:Registry')

export default {
  name: 'Registry',
  components: { Stripe, TargetLogo, AmazonLogo },
  metaInfo: {
    title: metadata.title.registry,
    meta: [
      { name: 'description', content: metadata.description.registry },
      { property: 'og:title', content: metadata.title.registry },
      { property: 'og:description', content: metadata.description.registry },
      { property: 'twitter:title', content: metadata.title.registry },
      { property: 'twitter:description', content: metadata.description.registry },
    ],
  },
}
</script>

<style lang="scss" scoped>
.registry {}
</style>
