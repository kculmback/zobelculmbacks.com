import initRouter from './index'
import ComingSoon from '../views/ComingSoon.vue'

/**
 * @function defineRouter
 *
 * @param {Store} store Instance of Vuex Store; used to sync router to correct store
 */
export default function defineRouter (store) {
  const routes = [
    {
      path: '/',
      name: 'ComingSoon',
      component: ComingSoon,
    },
  ]

  return initRouter(routes, store)
}
