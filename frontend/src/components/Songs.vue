<template lang="pug">
  form.songs(@submit.prevent="handleSubmit")
    .songs__success(v-if="success")
      p.text-center.text-lg.text-green-dark.mb-4 Song suggestions submitted!
      button.bg-blue.text-white.px-2.py-3.rounded.mx-auto.block(type="button" @click="reset" class="hover:bg-blue-dark hover:text-white") Submit More
    template(v-else)
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
      button.songs__add.bg-green.text-white.px-2.py-3.rounded.w-full(type="submit" class="hover:bg-green-dark hover:text-white") {{ submitting ? 'Submitting...' : `Submit Song${ songs.length > 1 ? 's' : '' }` }}
      .my-4(v-if="submitError")
        p.text-center.text-red Could not submit songs. Please make sure all fields are filled in. If the issue persists, please contact Kasey or Kayla.
</template>

<script>
import debug from 'debug'
import axios from '../helpers/axios'

const log = debug('component:Songs')

const songTemplate = { name: null, artist: null }

export default {
  name: 'Songs',
  data () {
    return {
      songs: [{ ...songTemplate }],
      submitting: false,
      submitError: false,
      success: false,
    }
  },
  methods: {
    addSong () {
      this.songs.push({ ...songTemplate })
    },

    removeSong (index) {
      this.songs.splice(index, 1)
    },

    reset () {
      this.songs = [{ ...songTemplate }]
      this.submitting = false
      this.submitError = false
      this.success = false
    },

    handleSubmit () {
      if (this.submitting || this.loading) return

      this.submitting = true
      this.submitError = false
      this.success = false

      axios
        .post('songs', {
          songs: this.songs,
          invite_id: parseInt(this.$route.params.invite_id),
        })
        .then(response => {
          log(response)
          this.success = true
        })
        .catch(error => {
          log(error)
          this.submitError = true
        })
        .finally(() => {
          this.submitting = false
        })
    },
  },
}
</script>

<style lang="postcss" scoped>
.songs {}
</style>
