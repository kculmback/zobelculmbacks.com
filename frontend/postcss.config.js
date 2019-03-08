class TailwindExtractor {
  static extract (content) {
    return content.match(/[A-Za-z0-9-_:\/]+/g) || []
  }
}

const purgecssConfig = {
  content: [
    './src/**/*.html',
    './src/**/*.vue',
  ],
  whitelist: ['body', 'html'],
  extractors: [
    {
      extractor: TailwindExtractor,
      extensions: ['html', 'js', 'php', 'vue'],
    },
  ],
}

module.exports = {
  plugins: [
    require('postcss-advanced-variables'),
    require('postcss-nested'),
    require('tailwindcss')('tailwind.js'),
    require('autoprefixer')(),
    require('postcss-hexrgba'),
    // require('@fullhuman/postcss-purgecss')(purgecssConfig),
    process.env.NODE_ENV === 'production'
      ? require('@fullhuman/postcss-purgecss')(purgecssConfig)
      : '',
  ],
}
