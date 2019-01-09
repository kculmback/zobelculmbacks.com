import Vue from 'vue'
import Router from 'vue-router'
import debug from 'debug'
import { sync } from 'vuex-router-sync'

// import globalRoutes from './globalRoutes'

const log = debug('router')

/**
 * @function initRouter
 *
 * @param {Array}    routes             Array of routes
 * @param {Store}    store              Instance of Vuex Store
 * @param {Object}   options            Optional parameters
 * @param {Function} options.beforeEach Function that tells router what to do before each route navigation
 */
export default function initRouter (routes, store, options = {}) {
  Vue.use(Router)

  const router = new Router({
    mode: 'history',
    base: '/',
    scrollBehavior (to, from, savedPosition) {
      if (to.hash) {
        return {
          selector: to.hash,
        }
      } else if (savedPosition) {
        return savedPosition
      } else {
        return { x: 0, y: 0 }
      }
    },
    routes: [
      // ...globalRoutes,
      ...routes,
    ],
  })

  if (options.beforeEach) {
    router.beforeEach(options.beforeEach)
  }

  sync(store, router, { moduleName: 'route' })

  log('Initialized Router')

  return router
}
