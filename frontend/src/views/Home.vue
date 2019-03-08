<template lang="pug">
  .home.pb-16
    .home__hero.relative
      img.w-full(:src="require('@/assets/photos/kasey-kayla.jpg')")
      h1.home__heading.absolute.text-white.text-4xl.w-full.text-center(class="sm:text-6xl") We're getting married!!
    .container
      .py-6.flex.items-center.justify-center
        .w-32.pt-12.mr-4
          calendar.max-w-full
        div
          h2.mb-2 The Details
          p.mb-1 September 7th, 2019
          p Denison Ridge
          p 4702 Furzee Rd
          p Clayton, WA 99110
          p
            a(href="https://denisonridge.com/" target="_blank") www.denisonridge.com
      hr.hr-fade
      .py-6
        p Looking for more information? If you're in need of a place to stay, take a peek at some nearby #[router-link(:to="{ name: 'Accommodation' }") accommodations]. Not sure of what to do when in Spokane? Check out our #[router-link(:to="{ name: 'Activities' }") local activites suggestions]! If you're looking for the registry, you can find it #[router-link(:to="{ name: 'Registry' }") here].
</template>

<script>
import Calendar from '@/assets/icons/calendar.svg'

export default {
  name: 'home',
  components: {
    Calendar,
  },
}
</script>

<style lang="postcss" scoped>
.home {
  &__heading {
    bottom: 15%;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
  }
}
</style>
