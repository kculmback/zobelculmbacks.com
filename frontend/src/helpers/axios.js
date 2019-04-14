import axios from 'axios'
import config from '../config'
// import Cookies from 'js-cookie'

const instance = axios.create({
  baseURL: config.get('apiBase'),
})
// instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
// instance.defaults.headers.common['X-CSRF-TOKEN'] = Cookies.get('XSRF-TOKEN') || document.head.querySelector('meta[name="csrf-token"]').content

export const CancelToken = axios.CancelToken

export default instance
