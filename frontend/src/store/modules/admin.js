// import debug from 'debug'
import Cookies from 'js-cookie'
import axios from '../../helpers/axios'
import { tokenExpiration } from '../../helpers/token'

// let log = debug('store:stripe')

const admin = {
  strict: true,

  namespaced: true,

  state: {
    token: Cookies.get('token'),
    invites: [],
    page: null,
    nextPage: null,
  },

  mutations: {
    SET_AUTH_TOKEN (state, token) {
      state.token = token
      console.log(state.token)

      if (token) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
        Cookies.set('token', token, {
          expires: tokenExpiration(token),
        })
      } else {
        delete axios.defaults.headers.common['Authorization']
        Cookies.remove('token')
      }
    },

    SET_INVITES (state, { invites, page, nextPage }) {
      state.invites = invites
      state.page = parseInt(page)
      state.nextPage = nextPage
    },
  },

  getters: {},

  actions: {
    login ({ commit }, data) {
      return new Promise((resolve, reject) => {
        axios
          .post('login', data)
          .then(response => {
            const token = response.data.access_token
            commit('SET_AUTH_TOKEN', token)
            resolve()
          })
          .catch(error => reject(error))
      })
    },

    logout ({ commit }) {
      commit('SET_AUTH_TOKEN', null)
    },

    getInvite (context, id) {
      return new Promise((resolve, reject) => {
        axios
          .get(`invites/${id}`)
          .then(response => {
            resolve(response.data.guests)
          })
          .catch(error => reject(error))
      })
    },

    getInvites ({ commit }, { take, status, page }) {
      return new Promise((resolve, reject) => {
        axios
          .get('invites', {
            params: {
              take,
              status,
              page,
            },
          })
          .then(response => {
            commit('SET_INVITES', {
              invites: response.data.data,
              page: response.data.current_page,
              nextPage: response.data.next_page_url,
            })
            resolve()
          })
          .catch(error => reject(error))
      })
    },
  },
}

export default admin
