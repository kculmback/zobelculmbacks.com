import initRouter from './index'
import Dashboard from '@/views/admin/Dashboard.vue'

/**
 * @function defineRouter
 *
 * @param {Store} store Instance of Vuex Store; used to sync router to correct store
 */
export default function defineRouter (store) {
  const routes = [
    {
      path: '/',
      name: 'Dashboard',
      component: Dashboard,
    },
  ]

  return initRouter(routes, store, { base: '/admin' })
}
