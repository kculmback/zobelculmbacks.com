import initRouter from './index'
import Dashboard from '@/views/admin/Dashboard.vue'
import Login from '@/views/admin/Login.vue'
import Invite from '@/views/admin/Invite.vue'
import EditInvite from '@/views/admin/EditInvite.vue'
import Rsvps from '@/views/admin/Rsvps.vue'

/**
 * @function defineRouter
 *
 * @param {Store} store Instance of Vuex Store; used to sync router to correct store
 */
export default function defineRouter (store) {
  const routes = [
    {
      path: '/login',
      name: 'Login',
      component: Login,
    },
    {
      path: '/',
      name: 'Dashboard',
      component: Dashboard,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/rsvps',
      name: 'Rsvps',
      component: Rsvps,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/invite/:id',
      name: 'Invite',
      component: Invite,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/invite/:id/edit',
      name: 'Edit Invite',
      component: EditInvite,
      meta: {
        requiresAuth: true,
      },
    },
  ]

  const beforeEach = (to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!store.state.admin.token) {
        next({ name: 'Login' })
        return false
      }
    }

    next()
  }

  return initRouter(routes, store, { base: '/admin', beforeEach })
}
