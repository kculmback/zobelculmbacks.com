import entry from './index'
import store from './../store/comingSoon'
import defineRouter from './../router/comingSoon'

const router = defineRouter(store)

entry(router, store, 'comingSoon')
