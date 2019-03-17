import Config from './config'

const production = {
  isLocal: false,
  isProduction: true,
  guard: true,
  stripe: 'pk_live_jBiXcr3SXt3RunMQC9AfmP6J',
}

const dev = {
  ...production,
  isLocal: true,
  isProduction: false,
  guard: false,
  stripe: 'pk_test_Ml0jaaUAIzMtGk5lRRrg9yte',
}

// initialize config
Config
  .default(production)
  .environment(/zobelculmbacks.test/, { ...dev })
  .environment(/localhost/, { ...dev })
  .detect()

export default Config
