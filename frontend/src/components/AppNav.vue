<template lang="pug">
  .topbar.fixed.pin-t.pin-l.w-full.flex.justify-between.items-center.h-16.bg-white.px-6.font-hand.text-2xl.text-grey-darkest.shadow
    router-link.text-grey-darkest(to="/" class="hover:text-black") ZobelCulmbacks 2019
    button.hamburger.hamburger--spin(
      type="button"
      :class="{ 'hamburger--active': menuOpen }"
      @click="menuOpen = !menuOpen"
    )
      span.hamburger__box
        span.hamburger__inner
    .nav.absolute(:class="{ 'nav--active': menuOpen }")
      ring.nav__ring.z-10.relative
      .nav__inner.rounder-circle.bg-white.absolute.text-center.z-20
        nav.absolute.center-both
          ul.list-reset
            li.mb-3
              router-link.flex.items-center.justify-center.text-xl(
                class="sm:text-2xl"
                :to="{ name: 'RSVP' }"
                @click.native="menuOpen = false"
              )
                rsvp.w-8.mr-2(class="sm:w-10")
                | RSVP
            li.mb-3
              router-link.flex.items-center.justify-center.text-xl(
                class="sm:text-2xl"
                :to="{ name: 'Details' }"
                @click.native="menuOpen = false"
              )
                calendar.w-8.mr-2(class="sm:w-10")
                | Day Of
            li.mb-3
              router-link.flex.items-center.justify-center.text-xl(
                class="sm:text-2xl"
                :to="{ name: 'Activities' }"
                @click.native="menuOpen = false"
              )
                activities.w-8.mr-2(class="sm:w-10")
                | Activities
            li.mb-3
              router-link.flex.items-center.justify-center.text-xl(
                class="sm:text-2xl"
                :to="{ name: 'Accommodations' }"
                @click.native="menuOpen = false"
              )
                accommodations.w-8.mr-2(class="sm:w-10")
                | Accommodations
            li
              router-link.flex.items-center.justify-center.text-xl(
                class="sm:text-2xl"
                :to="{ name: 'Registry' }"
                @click.native="menuOpen = false"
              )
                registry.w-8.mr-2(class="sm:w-10")
                | Registry
</template>

<script>
// import debug from 'debug'

import Ring from '@/assets/icons/engagement-ring.svg'
import Calendar from '@/assets/icons/calendar.svg'
import Activities from '@/assets/icons/wedding-car.svg'
import Accommodations from '@/assets/icons/honey-moon.svg'
import Registry from '@/assets/icons/gifts.svg'
import rsvp from '@/assets/icons/love-letter.svg'

// const log = debug('component:AppNav')

export default {
  name: 'AppNav',
  data () {
    return {
      menuOpen: false,
    }
  },
  components: { Ring, Calendar, Activities, Accommodations, Registry, rsvp },
}
</script>

<style lang="postcss" scoped>
.nav {
  top: 65%;
  right: -5px;
  transform: scale(0);
  transform-origin: top right;
  transition: transform 300ms;

  &--active {
    transform: scale(1);
  }

  &__ring {
    max-width: 100vw;
    width: 550px;
    transform: rotate(-120deg);
  }

  &__inner {
    width: 376px;
    height: 376px;
    max-width: 69vw;
    max-height: 69vw;
    border-radius: 50%;
    top: 11%;
    right: 7.7%;
  }
}
</style>

<style lang="scss" scoped>
.hamburger {
  $hamburger-padding-x                       : 10px !default;
  $hamburger-padding-y                       : 10px !default;
  $hamburger-layer-width                     : 30px !default;
  $hamburger-layer-height                    : 3px !default;
  $hamburger-layer-spacing                   : 5px !default;
  $hamburger-layer-color                     : #3d4852;
  $hamburger-layer-border-radius             : 10px !default;
  $hamburger-hover-opacity                   : 0.7 !default;
  $hamburger-hover-transition-duration       : 0.15s !default;
  $hamburger-hover-transition-timing-function: linear !default;

  // To use CSS filters as the hover effect instead of opacity,
  // set $hamburger-hover-use-filter as true and
  // change the value of $hamburger-hover-filter accordingly.
  $hamburger-hover-use-filter: false !default;
  $hamburger-hover-filter    : opacity(50%) !default;
  padding: $hamburger-padding-y $hamburger-padding-x;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;

  transition-property: opacity, filter;
  transition-duration: $hamburger-hover-transition-duration;
  transition-timing-function: $hamburger-hover-transition-timing-function;

  // Normalize (<button>)
  font: inherit;
  color: inherit;
  text-transform: none;
  background-color: transparent;
  border: 0;
  // margin: 0;
  overflow: visible;

  &:focus {
    outline: 0;
  }

  &__box {
    width: $hamburger-layer-width;
    height: $hamburger-layer-height * 3 + $hamburger-layer-spacing * 2;
    display: inline-block;
    position: relative;
  }

  &__inner {
    display: block;
    top: 50%;
    // margin-top: $hamburger-layer-height / -2;

    &,
    &::before,
    &::after {
      width: $hamburger-layer-width;
      height: $hamburger-layer-height;
      background-color: $hamburger-layer-color;
      border-radius: $hamburger-layer-border-radius;
      position: absolute;
      transition-property: transform;
      transition-duration: 0.15s;
      transition-timing-function: ease;
    }

    &::before,
    &::after {
      content: "";
      display: block;
    }

    &::before {
      top: ($hamburger-layer-spacing + $hamburger-layer-height) * -1;
    }

    &::after {
      bottom: ($hamburger-layer-spacing + $hamburger-layer-height) * -1;
    }
  }

  &--spin {
    .hamburger__inner {
      transition-duration: 0.22s;
      transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);

      &::before {
        transition: top 0.1s 0.25s ease-in,
                    opacity 0.1s ease-in;
      }

      &::after {
        transition: bottom 0.1s 0.25s ease-in,
                    transform 0.22s cubic-bezier(0.55, 0.055, 0.675, 0.19);
      }
    }

    &.hamburger--active {
      .hamburger__inner {
        transform: rotate(225deg);
        transition-delay: 0.12s;
        transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);

        &::before {
          top: 0;
          opacity: 0;
          transition: top 0.1s ease-out,
                      opacity 0.1s 0.12s ease-out;
        }

        &::after {
          bottom: 0;
          transform: rotate(-90deg);
          transition: bottom 0.1s ease-out,
                      transform 0.22s 0.12s cubic-bezier(0.215, 0.61, 0.355, 1);
        }
      }
    }
  }
}
</style>
