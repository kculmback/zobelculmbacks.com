<template lang="pug">
  form.songs(@submit.prevent="handleSubmit")
    .songs__song.song.border-grey-lighter.border.rounded.p-4.mb-6(v-for="song, index in songs")
      .song__name.mb-4
        label.song__label.mb-2.block Song Name
        input.song__input.rounded.shadow-md.w-full.px-2.py-4.border.border-grey-lighter(ref="inputs" v-model="song.name" required)
      .song__artist.mb-6
        label.song__label.mb-2.block Song Artist
        input.song__input.rounded.shadow-md.w-full.px-2.py-4.border.border-grey-lighter(ref="inputs" v-model="song.artist" required)
      .song__delete
        button.song__button.bg-blue.text-white.px-2.py-3.rounded.w-full(type="button" @click="removeSong(index)" class="hover:bg-blue-dark hover:text-white") Delete Song
    button.songs__add.bg-blue.text-white.px-2.py-3.rounded.w-full.mb-6(type="button" @click="addSong" class="hover:bg-blue-dark hover:text-white") Add Another Song
    button.songs__add.bg-blue.text-white.px-2.py-3.rounded.w-full(type="submit" @click="handleSubmit" class="hover:bg-blue-dark hover:text-white") Submit Song{{ songs.length > 1 ? 's' : '' }}
</template>

<script>
// import debug from 'debug'

// const log = debug('component:Songs')

const songTemplate = { name: null, artist: null }

export default {
  name: 'Songs',
  data () {
    return {
      songs: [{ ...songTemplate }],
    }
  },
  methods: {
    addSong () {
      this.songs.push({ ...songTemplate })
    },

    removeSong (index) {
      this.songs.splice(index, 1)
    },

    handleSubmit () {
      console.log(this.songs)
    },
  },
}
</script>

<style lang="postcss" scoped>
.songs {}
</style>
