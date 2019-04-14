// import debug from 'debug'
import axios from '../../helpers/axios'

// let log = debug('store:stripe')

const rsvp = {

  strict: true,

  namespaced: true,

  state: {
    searchResults: [],
    searchError: false,
    // guests: [],
    name: '',
  },

  mutations: {
    SET_SEARCH_RESULTS (state, results) {
      state.searchResults = Object.values(results)
    },

    CLEAR_SEARCH_RESULTS (state) {
      state.searchResults = []
    },

    SET_SEARCH_ERROR (state, error) {
      state.searchError = error
    },

    // SET_GUESTS (state, guests) {
    //   state.guests = guests
    // },

    SET_NAME (state, name) {
      state.name = name
    },
  },

  getters: {
  },

  actions: {
    submitSearch ({ commit, dispatch }, search) {
      return new Promise((resolve, reject) => {
        axios.get(`rsvp/search?q=${search}`)
          .then(response => {
            commit('SET_SEARCH_RESULTS', response.data)
            resolve()
          })
          .catch(reject)
      })
    },

    clearSearchResults ({ commit }) {
      commit('CLEAR_SEARCH_RESULTS')
    },

    setName ({ commit }, name) {
      commit('SET_NAME', name)
    },

    getInvite ({ commit }, id) {
      // commit('SET_GUESTS', [])

      return new Promise((resolve, reject) => {
        axios.get(`rsvp/${id}`)
          .then(response => {
            // commit('SET_GUESTS', response.data.guests)
            resolve(response.data.guests)
          })
          .catch(reject)
      })
    },

    rsvp (context, { rsvps, id }) {
      return new Promise((resolve, reject) => {
        axios.post(`rsvp/${id}`, { guests: rsvps })
          .then(resolve)
          .catch(reject)
      })
    },
  },
}

export default rsvp
