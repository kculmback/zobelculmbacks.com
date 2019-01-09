/**
 * @example
 * // Require Config
 * const Config = require('framework/config')
 *
 * // Setup Default config - only needs setup initally
 * config.default({
 *  apiBase: '',
 *  twitter: {
 *    key: 'prodkey'
 *  },
 *  facebook: {
 *    key: 'prodKey',
 *  }
 * }).environment(/14four.com/, {
 *  facebook: {
 *    key: '14fourkey',
 *  }
 * }).environment(/joshdev.14four.com/, {
 *  apiBase: 'http://stevedev.14four.com/'
 * }).detect();
 *
 * // Get a configurate setting
 * Config.get('apiBase');
 */

class Config {
  constructor () {
    this.env = undefined
    this.config = {}
    this.environments = []
  }

  /**
   * [default description]
   * @param  {object} config =             {} Default configuration object
   * @return {object}        this instance
   */
  default (config = {}) {
    this.config = Object.assign({}, config)

    return this
  }

  /**
   * Push environment onto environments
   * @param  {string|regex} match Regex to be matched against domain
   * @param  {object} data  =             {} Object of data to be appended to default object if matched
   * @return {object}       this instance
   */
  environment (match, config = {}) {
    this.environments.push({
      match: match,
      config: config,
    })

    return this
  }

  /**
   * Detect the current Working environment
   * @return {object} returns an instance of this.
   * @return {object}       this instance
   */
  detect () {
    let location = window.location.href
    let config = {}

    this.environments.forEach((environment) => {
      if (environment.match.test(location)) {
        config = Object.assign({}, config, environment.config)
      }
    })

    this.config = Object.assign({}, this.config, config)

    return this
  }

  /**
   * Get Configuration from name
   * @param  {string} name =             '' string of the config to get
   * @return {string|object}      Get the value of a config variable from the current environment
   */

  get (name = '') {
    // convert indexes to properties
    name = name.replace(/\[(\w+)\]/g, '.$1')
    // strip a leading dot
    name = name.replace(/^\./, '')

    let a = name.split('.')
    for (var i = 0, n = a.length; i < n; ++i) {
      var k = a[i]
      if (k in this.config) {
        return this.config[k]
      } else {
        return false
      }
    }
    return false
  }

  set (obj = {}) {
    this.config = Object.assign({}, this.config, obj)
    return this
  }
}

export default new Config()
