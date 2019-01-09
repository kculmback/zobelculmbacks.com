import Config from './config'

const production = {
  isLocal: false,
  isProduction: true,
  guard: true,
}

const dev = {
  ...production,
  isLocal: true,
  isProduction: false,
  guard: false,
}

// initialize config
Config
  .default(production)
  .environment(/zobelculmbacks.test/, { ...dev })
  .environment(/localhost/, { ...dev })
  .detect()

export default Config
