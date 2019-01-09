import initRouter from './index'
import Home from '../views/Home.vue'

/**
 * @function defineRouter
 *
 * @param {Store} store Instance of Vuex Store; used to sync router to correct store
 */
export default function defineRouter (store) {
  const routes = [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
  ]

  return initRouter(routes, store)
}
