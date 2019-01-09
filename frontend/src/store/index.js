import Vue from 'vue'
import Vuex from 'vuex'
import debug from 'debug'

import root from './modules/root'

const log = debug('store')

/**
 * @function initStore
 *
 * @param {Object} modules Object containing the imported modules for the particular store
 */
export default function initStore (modules) {
  Vue.use(Vuex)

  root.modules = modules

  const store = new Vuex.Store(root)

  log('Initial State', store.state)

  return store
}
