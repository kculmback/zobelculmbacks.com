const path = require('path')

const getArgument = (argToCheck) => {
  const position = process.argv.findIndex(arg => arg === argToCheck)
  if (position === -1) return false
  return process.argv[process.argv.findIndex(arg => arg === argToCheck) + 1]
}

const name = getArgument('--entry-name')

const port = process.env.DEV_PORT || 3000

module.exports = {
  baseUrl: process.env.NODE_ENV === 'production' ? `/build/${name}` : '/',
  outputDir: process.env.NODE_ENV === 'production' ? `../public/build/${name}` : 'dist',
  indexPath: process.env.NODE_ENV === 'production' ? path.join(__dirname, `../resources/views/${name}.blade.php`) : 'index.html',
  chainWebpack: config => {
    const svgRule = config.module.rule('svg')
    svgRule.uses.clear()
    svgRule.use('vue-svg-loader')
      .loader('vue-svg-loader')

    config.plugins.delete('prefetch')
  },
  devServer: {
    port,
    disableHostCheck: true,
  },
}
