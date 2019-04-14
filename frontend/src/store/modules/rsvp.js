// import debug from 'debug'
import axios from '../../helpers/axios'

// let log = debug('store:stripe')

const rsvp = {

  strict: true,

  namespaced: true,

  state: {
    searchResults: [],
    searchError: false,
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
  },

  getters: {
  },

  actions: {
    submitSearch ({ commit, dispatch }, search) {
      return new Promise((resolve, reject) => {
        axios.get(`search?q=${search}`)
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
  },
}

export default rsvp
