import Vue from 'vue'
import debug from 'debug'

import App from './../App.vue'
import Config from './../config'

/**
 * @function initEntry
 *
 * @param {Router} router             Accepts an instance of Vue Router
 * @param {Store}  store              Accepts an instance of Vuex Store
 * @param {String} entryName            The name of the entry point, such as 'main'
 * @param {Object} [options={}]       Any optional properties to add to the Vue instance
 * @param {Array}  options.components Components to add that are specific to this entry point
 * @param {Array}  options.plugins    Plugins to add that are specific to this entry point
 * @param {Array}  options.prototypes Prototypes to add that are specific to this entry point
 */
export default function entry (router, store, entryName, options = {}) {
  Vue.config.productionTip = false

  if (options.components) {
    options.components.forEach(component => {
      Vue.component(component.name, component.var)
    })
  }

  if (options.plugins) {
    options.plugins.forEach(plugin => {
      Vue.use(plugin)
    })
  }

  if (options.prototypes) {
    options.prototypes.forEach(prototype => {
      Vue.prototype[prototype.name] = prototype.var
    })
  }

  new Vue({
    router,
    store,
    data: {
      site: entryName,
    },
    render: h => h(App),
  }).$mount('#app')

  if (Config.get('enableDebug') || Config.get('isLocal')) {
    debug.enable('app*,store*,router*,view*,component*,api*,helper*')
    debug(`app:${entryName}`)(`Initialized ${entryName}`)

    // make the global store available on the window for local development
    window.STORE = store
  }
}
