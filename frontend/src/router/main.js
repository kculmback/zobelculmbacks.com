import initRouter from './index'
// import Home from '../views/Home.vue'
const Home = () => import('../views/Home.vue')
const Details = () => import('../views/Details.vue')
const Activities = () => import('../views/Activities.vue')
const Accommodations = () => import('../views/Accommodations.vue')
const Registry = () => import('../views/Registry.vue')
const Success = () => import('../views/Success.vue')
const RSVP = () => import('../views/RSVP.vue')
const Invite = () => import('../views/Invite.vue')

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
    {
      path: '/details',
      name: 'Details',
      component: Details,
    },
    {
      path: '/activities',
      name: 'Activities',
      component: Activities,
    },
    {
      path: '/accommodations',
      name: 'Accommodations',
      component: Accommodations,
    },
    {
      path: '/registry',
      name: 'Registry',
      component: Registry,
    },
    {
      path: '/registry/success',
      name: 'Success',
      component: Success,
    },
    {
      path: '/rsvp',
      name: 'RSVP',
      component: RSVP,
    },
    {
      path: '/rsvp/:invite_id',
      name: 'Inivte',
      component: Invite,
    },
  ]

  return initRouter(routes, store)
}
