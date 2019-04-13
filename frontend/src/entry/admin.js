import entry from './index'
import store from './../store/admin'
import defineRouter from './../router/admin'
import App from '@/views/admin/App.vue'

// import '@/styles/main.css'
import './../styles/admin/main.css'

const router = defineRouter(store)

entry(router, store, 'admin', { App })
