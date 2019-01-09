<template lang="pug">
.save-date
  .save-date__photos
    .save-date__photo.save-date__first-photo
    .save-date__photo.save-date__second-photo
  .save-date__info
    h1 Kasey Culmback & Kayla Zobel are getting married!
    p September 7th, 2018
    p Denison Ridge<br>4702 Furzee Rd<br>Clayton, WA 99110
    p Check back later for more info...
</template>

<script>
export default {
  name: 'ComingSoon',
}
</script>

<style lang="scss" scoped>
.save-date {
  &__photos {
    width: 100%;
    display: flex;
  }

  &__photo {
    // position: absolute;
    // border: 1rem white solid;
    margin: 1rem;
    background-size: cover;
    background-position: center;

    // &::after {
    //   content: "";
    //   display: block;
    //   width: 100%;
    // }
  }

  &__first-photo {
    width: 40vw;
    height: 40vw;
    // top: 0;
    // left: 0;
    background-image: url('../assets/photos/KCA_7802.jpg');

    // &::after {
    //   padding-top: 91%;
    // }
  }

  &__second-photo {
    width: 60vw;
    height: 40vw;
    margin-left: 0;
    // bottom: 0;
    // right: 0;
    background-image: url('../assets/photos/KCA_7795.jpg');

    // &::after {
    //   padding-top: 65%;
    // }
  }

  &__info {
    // position: absolute;
    // background: white;
    color: $navy;
    // padding: 1rem;
    // // border-radius: 0.5rem;
    // box-shadow: 2px 2px 2px rgba($color: #000000, $alpha: 0.25);
    // top: 1rem;
    // right: 1rem;
    text-align: center;
    padding: 0 1rem;

    h1 {
      font-size: 2.5rem;

      @include media-breakpoint-down(md) {
        font-size: 2rem;
      }
    }
  }
}
</style>
