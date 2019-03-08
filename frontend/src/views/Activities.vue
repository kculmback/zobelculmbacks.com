<template lang="pug">
  .activities.pt-6
    h1.text-center Activities
    .max-w-md.mx-auto
      section.mb-8
        p.mb-4 Spokane has plenty of activities to, especially at the beginning of September! We'll list some of our go to activities, but you should definitely check out these other sites for ideas as well:
        ul
          li
            a(href="https://www.visitspokane.com/" target="_blank") VisitSpokane.com
          li
            a(href="https://www.inlander.com/spokane/eventsearch" target="_blank") Inlander Events Calendar
          li
            a(href="https://www.coeurdalene.org/" target="_blank") Visit Coeur D'alene
      section.mb-8
        .flex.items-center.justify-center.mb-4
          tree.w-16.mr-4
          h2.text-center Outdoor Activities & Parks
        ul
          li.mb-2
            p Manito Park
            p Lots of different gardens, ponds, and areas to explore
          li.mb-2
            p Bowl & Pitcher
            p Great picnic areas and hiking trails
          li.mb-2
            p Riverside State Park
            p Connects to Bowl & Pitcher
          li.mb-2
            p Mt. Spokane
            p Hiking
          li.mb-2
            p Green Bluff farms
            p Lots of u-pick farms and family activities
          li.mb-2
            p Riverfront Park
            p Runs through downtown
          li.mb-2
            p Coeur D'alene Waterfront
            p Downtown Coeur D'alene is a nice area to walk around, window shop, and hang out by the lake
          li.mb-2
            p Mica Moon Zipline
            p Highly recommended by us!
          li.mb-2
            p For the very adventerous you can find river rafting, hang gliding, zip lines, parasailing, and more either in Spokane or within an hours drive!
      section.mb-8
        .flex.items-center.justify-center.mb-4
          tickets.w-16.mr-4
          h2.text-center Paid Activities
        ul
          li.mb-2
            p Spokane Indians
            p Minor league baseball team
          li.mb-2
            p Northwest Museum of Art & Culture (MAC)
          li.mb-2
            p Blue Door Improv
            p Local improv group
          li.mb-2
            p Spokane Comedy Club
            p They bring in comedians from all over the US; check the schedule on their site!
          li.mb-2
            p Mobius Science Center
            p Great famiy activity
          li.mb-2
            p Fox Theater
          li.mb-2
            p Bing Crosby Theater
      section.mb-8
        .flex.items-center.justify-center.mb-4
          alcohol.w-16.mr-4
          h2.text-center Alcohol
        p.mb-4.text-center Check out the #[a(href="http://inlandnwaletrail.com/" target="_blank") Inland Northwest Ale Trail] for some great breweries!
        ul
          li.mb-2
            p Big Barn Brewery (very family friendly)
          li.mb-2
            p Arbor Crest Winery (usually has outdoor concerts)
          li.mb-2
            p Bellweather Brewery
          li.mb-2
            p Iron Goat Brewery
          li.mb-2
            p 238 Brewery
          li.mb-2
            p Pints & Corks
          li.mb-2
            p Community Pint
          li.mb-2
            p Bon Bon
          li.mb-2
            p Durkin’s
          li.mb-2
            p One Tree Cider House
          li.mb-2
            p Ruins
      section.mb-8
        .flex.items-center.justify-center.mb-4
          burger.w-16.mr-4
          h2.text-center Food
        p.mb-4.text-center Spokane has plenty of amazing places to eat, many more than we can list here! These are just some of our go-tos.
        ul
          li.mb-2 Frank’s Diner
          li.mb-2 Flying Goat
          li.mb-2 Republic Pi
          li.mb-2 Incrediburger
          li.mb-2 Pho Van
          li.mb-2 Hello Sugar
          li.mb-2 Boots (highly recommend the pumpkin waffle)
          li.mb-2 Biscuit Wizard
          li.mb-2 Saranac
          li.mb-2 Cascadia Public House
          li.mb-2 Bruncheonette
          li.mb-2 The Scoop
          li.mb-2 Poole's
</template>

<script>
// import debug from 'debug'

import Tree from '@/assets/icons/tree.svg'
import Tickets from '@/assets/icons/tickets.svg'
import Alcohol from '@/assets/icons/alcohol.svg'
import Burger from '@/assets/icons/burger.svg'

// const log = debug('view:Activities')

export default {
  name: 'Activities',
  components: {
    Tree,
    Tickets,
    Alcohol,
    Burger,
  },
}
</script>

<style lang="scss" scoped>
.activities {}
</style>
