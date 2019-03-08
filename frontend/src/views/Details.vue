<template lang="pug">
  .details.text-center.pt-8.px-4.max-w-lg.mx-auto
    .details__section.mb-8
      h1 Day Of Information
    .details__section
      h2.mb-2 Date & Time
      p.mb-2 September 7th, 2019
      p.mb-2 Ceremony to start at 4:30pm, <br> reception to follow immediately after.
      router-link.font-hand.text-3xl(:to={ name: 'RSVP' }) RSVP
    hr.hr-fade.mt-8.mb-6
    .details__section
      h2.mb-2 Location
      p.mb-2 Wedding & Reception will be held at Denison Ridge.
      p 4702 Furzee Rd
      p.mb-2 Clayton, WA 99110
      p.mb-4
        a(href="https://denisonridge.com/" target="_blank") www.denisonridge.com
      h3.mb-2 Map
      <iframe class="mb-4 w-full" width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJxbx_isAAYlMRYfi47kEP3bY&key=AIzaSyBvIUGs_U9euvjqQ0jxatH3JMJyXttBo7s" allowfullscreen></iframe>
      h3.mb-2 Parking
      p There will be ample parking available at the wedding venue!
    hr.hr-fade.mt-8.mb-6
    .details__section.mb-8
      h2.mb-2 Food & Drink
      p.mb-2 Food will be provided by #[a Soulful Soups]. There will be meat, vegetarian, vegan, and gluten free options available!
      p.mb-2 Beer, wine, water, and soft drinks will be available to drink.
    hr.hr-fade.mt-10.mb-8
    .details__section.mb-8
      h1 Wedding Party
    .details__section.mb-8.flex.justify-center.items-center
      .w-32.mr-4
        bride
      .w-80
        ul.list-reset.text-left
          li.mb-1 Tonya Eggspuehler (Made of Honor)
          li.mb-1 Caroline Read
          li.mb-1 Dani Espinoza-Gonzalez
          li.mb-1 Eric Lopez
    .details__section.mb-8.flex.justify-center.items-center
      .w-32.mr-4
        groom
      .w-80
        ul.list-reset.text-left
          li.mb-1 Dustin Koenig (Best Man)
          li.mb-1 Danny Gubitz
          li.mb-1 Tucker Walker
</template>

<script>
// import debug from 'debug'

import Bride from '@/assets/icons/bride.svg'
import Groom from '@/assets/icons/wedding-suit.svg'

// const log = debug('view:Details')

export default {
  name: 'Details',
  components: { Bride, Groom },
}
</script>

<style lang="scss" scoped>
.details {}
</style>
