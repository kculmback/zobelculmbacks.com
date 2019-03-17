// import debug from 'debug'
import axios from '../../helpers/axios'

// let log = debug('store:stripe')

const stripe = {

  strict: true,

  namespaced: true,

  state: {
    // handler: null,
    // token: null,
    // stripeLoaded: false,
  },

  mutations: {
    // SET_HANDLER (state, handler) {
    //   state.handler = handler
    // },

    // SET_TOKEN (state, token) {
    //   state.token = token
    // },

    // SET_LOADED (state, loaded) {
    //   state.stripeLoaded = loaded
    // },
  },

  getters: {
  },

  actions: {
    // setHandler ({ commit }, handler) {
    //   commit('SET_HANDLER', handler)
    // },

    // setToken ({ commit }, token) {
    //   commit('SET_TOKEN', token)
    // },

    // setStripeLoaded ({ commit }, loaded) {
    //   log('stripeLoaded')
    //   commit('SET_LOADED', loaded)
    // },

    submitStripe ({ commit }, token) {
      return new Promise((resolve, reject) => {
        axios.post('/api/stripe', { token })
          .then(response => {
            console.log(response)
          })
          .catch(e => { reject(e) })
      })
    },
  },
}

export default stripe
