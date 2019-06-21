<template lang="pug">
  .topbar.fixed.pin-t.pin-l.w-full.flex.justify-between.items-center.h-16.bg-white.px-6.font-hand.text-2xl.text-grey-darkest.shadow
    router-link.text-grey-darkest(to="/" class="hover:text-black") ZobelCulmbacks Dashboard
    .nav.bg-white.shadow.absolute.pin-r.py-4.px-8(v-if="menuOpen")
      nav
        ul.list-reset
          li.mb-4
            router-link(:to="{ name: 'Dashboard' }") Dashboard
          li
            router-link(:to="{ name: 'Rsvps' }") RSVPs
    button.hamburger.hamburger--spin(
      type="button"
      :class="{ 'hamburger--active': menuOpen }"
      @click="menuOpen = !menuOpen"
    )
      span.hamburger__box
        span.hamburger__inner
</template>

<script>
// import debug from 'debug'

// const log = debug('component:AppNav')

export default {
  name: 'AppNav',
  data () {
    return {
      menuOpen: false,
    }
  },
}
</script>

<style lang="postcss" scoped>
.nav {
  top: 4rem;
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
