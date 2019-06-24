import initRouter from './index'
import Invites from '@/views/admin/Invites.vue'
import Login from '@/views/admin/Login.vue'
import Invite from '@/views/admin/Invite.vue'
import EditInvite from '@/views/admin/EditInvite.vue'
import Rsvps from '@/views/admin/Rsvps.vue'
import Songs from '@/views/admin/Songs.vue'

import { assertAlive } from '../helpers/token'

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
      path: '/invites',
      name: 'Invites',
      component: Invites,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/',
      name: 'Rsvps',
      component: Rsvps,
      meta: {
        requiresAuth: true,
      },
    },
    {
      path: '/songs',
      name: 'Songs',
      component: Songs,
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
    if (store.state.admin.token && !assertAlive(store.state.admin.token)) {
      store.dispatch('admin/logout')
    }

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
