<template lang="pug">
  .accommodations.text-center.pt-6.px-6
    h1.mb-8 Accommodations
    .mb-8
      h2.mb-2 Hotels
      p.mb-4.max-w-md.mx-auto This is by no means an exhaustive list! There are plenty of options. Spokane has a lot of options ranging from 30-45 minutes away. Check out Deer Park and Loon Lake for closer options (20ish minutes away).
      ul.list-reset.text-left.max-w-xs.mx-auto
        li.mb-4.flex(v-for="{ name, travel, link } in hotels").items-center
          .w-16.mr-4
            hotel
          .w-full
            p {{ name }}
            p {{ travel }}
            a(:href="link" target="_blank" rel="noopener nofollower") Website
    .mb-8
      h2.mb-2 Alternatives
      p.mb-4.max-w-md.mx-auto Don't want to stay in a hotel? Spokane has plenty of alternative options!
      ul.list-reset.text-left.max-w-sm.mx-auto
        li.mb-6.flex.items-center
          .w-16.mr-4
            airbnb
          .w-full
            p.mb-2 Airbnb is one of your best bets!
            p.mb-2 If you're new to Airbnb, you can use our #[a(href="https://www.airbnb.com/c/kaseyc7?currency=USD" target="_blank") referal link] to get a discount! (#[a(href="https://www.airbnb.com/c/kaseyc7" target="_blank") https://www.airbnb.com/c/kaseyc7])
            a(href="https://www.airbnb.com" target="_blank") Website
        .flex.justify-around.mb-4
          li
            a(href="https://www.vrbo.com/" target="_blank")
              vrbo
          li
            a(href="https://www.homeaway.com/" target="_blank")
              homeaway
</template>

<script>
// import debug from 'debug'

import Hotel from '@/assets/icons/hotel.svg'
import Airbnb from '@/assets/icons/airbnb.svg'
import Homeaway from '@/assets/logos/homeaway.svg'
import Vrbo from '@/assets/logos/vrbo.svg'

import metadata from '../helpers/metadata.js'

// const log = debug('view:Accommodations')

export default {
  name: 'Accommodations',
  metaInfo: {
    title: metadata.title.accommodations,
    meta: [
      { name: 'description', content: metadata.description.accommodations },
      { property: 'og:title', content: metadata.title.accommodations },
      { property: 'og:description', content: metadata.description.accommodations },
      { property: 'twitter:title', content: metadata.title.accommodations },
      { property: 'twitter:description', content: metadata.description.accommodations },
    ],
  },
  data () {
    return {
      hotels: [
        {
          name: 'Quality Inn Oakwood',
          travel: '30 minutes away',
          link: 'https://www.qualityinnoakwood.com/',
        },
        {
          name: 'La Quinta Inn & Suites Spokane North',
          travel: '30 minutes away',
          link: 'http://www.laquintaspokanenorth.com/',
        },
        {
          name: `Jerry's Landing Resort`,
          travel: '25 minutes away',
          link: 'http://www.jerryslandingresort.com/',
        },
        {
          name: `Shore Acres Resort On Loon`,
          travel: '20 minutes away',
          link: 'https://www.shoreacresresort.com/',
        },
        {
          name: `Granite Bay Resort`,
          travel: '20 minutes away',
          link: 'https://www.granitepointpark.com/',
        },
        {
          name: `Inn At The Lake`,
          travel: '35 minutes away',
          link: 'http://innatthelake.com/',
        },
        {
          name: `Spokane RV Resort`,
          travel: '20 minutes away',
          link: 'https://spokanervresort.com/',
        },
      ],
    }
  },
  components: { Hotel, Airbnb, Homeaway, Vrbo },
}
</script>

<style lang="scss" scoped>
.accommodations {}
</style>
