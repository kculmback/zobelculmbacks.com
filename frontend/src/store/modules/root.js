import debug from 'debug'

let log = debug('store:root')

const root = {

  strict: true,

  state: {
    site: null,
    loading: true,
  },

  mutations: {
    SET_SITE (state, site) {
      state.site = site

      log('mutation SET_SITE', state)
    },
    SET_LOADING (state, { loading }) {
      state.loading = loading
      log('mutation SET_LOADING', state)
    },
  },

  getters: {
  },

  actions: {
    init ({ commit }, site) {
      log('action init', site)
      commit('SET_SITE', site)
    },
    setLoading ({ commit }, loading) {
      log('action loading', loading)
      return new Promise((resolve, reject) => {
        commit('SET_LOADING', { loading })
        resolve(loading)
      })
    },
  },
}

export default root
