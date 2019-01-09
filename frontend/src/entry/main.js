import entry from './index'
import store from './../store/main'
import defineRouter from './../router/main'

const router = defineRouter(store)

entry(router, store, 'main')
