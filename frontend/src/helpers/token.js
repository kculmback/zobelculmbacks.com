import jwtDecode from 'jwt-decode'

export const assertAlive = token => {
  const { exp } = jwtDecode(token)
  const now = Date.now().valueOf() / 1000
  return exp > now
}

export const tokenExpiration = token => {
  const decoded = jwtDecode(token)
  const date = new Date(0)
  date.setUTCSeconds(decoded.exp)
  return date
}
