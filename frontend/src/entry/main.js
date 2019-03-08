import entry from './index'
import store from './../store/main'
import defineRouter from './../router/main'

// import '@/styles/main.css'
import './../styles/main.css'

const router = defineRouter(store)

entry(router, store, 'main')
