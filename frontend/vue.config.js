const path = require('path')
// function resolve (dir) {
//   return path.join(__dirname, dir)
// }

// const name = process.argv[process.argv.findIndex(arg => arg === '--entry-name') + 1]

const port = process.env.DEV_PORT || 4000
const https = process.env.HTTPS_OVERRIDE === 'true'

let homesteadUrl = () => { }
if (process.env.NODE_ENV === 'development') {
  if (!process.env.HOMESTEAD_URL) {
    throw new Error('You must set HOMESTEAD_URL in your .env.local file!')
  }
  homesteadUrl = () => {
    let homesteadUrl = process.env.HOMESTEAD_URL
    if (/^(f|ht)tps?:\/\//i.test(homesteadUrl)) return homesteadUrl
    else return `${https ? 'https' : 'http'}://${homesteadUrl}`
  }
}

module.exports = {
  baseUrl: process.env.NODE_ENV === 'production' ? '/build' : '/',
  outputDir: process.env.NODE_ENV === 'production' ? `../public/build` : 'dist',
  indexPath: process.env.NODE_ENV === 'production' ? path.join(__dirname, `../resources/views/main.blade.php`) : 'index.html',
  // css: {
  //   loaderOptions: {
  //     sass: {
  //       // this automatically injects the following files into Vue files in the SCSS section
  //       data: `
  //         @import "@/styles/_variables.scss";
  //         @import "@/styles/_breakpoints.scss";
  //       `,
  //     },
  //   },
  // },
  chainWebpack: config => {
    // // helps fix safari cache bug for hot reloading
    // if (process.env.NODE_ENV === 'development') {
    //   config
    //     .output
    //     .filename('[name].[hash].js')
    //     .end()
    // }

    const svgRule = config.module.rule('svg')
    svgRule.uses.clear()
    svgRule.use('vue-svg-loader')
      .loader('vue-svg-loader')

    config.plugins.delete('prefetch')
  },
  devServer: {
    https,
    port,
    proxy: homesteadUrl(),
    disableHostCheck: true,
    // host: '0.0.0.0',
    // watchOptions: {
    //   poll: true,
    // },
    // public: `192.168.10.90:${port}`,
  },
}
