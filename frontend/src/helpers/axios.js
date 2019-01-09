import axios from 'axios'
import Cookies from 'js-cookie'

const instance = axios.create()
instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
instance.defaults.headers.common['X-CSRF-TOKEN'] = Cookies.get('XSRF-TOKEN') || document.head.querySelector('meta[name="csrf-token"]').content

export default instance
