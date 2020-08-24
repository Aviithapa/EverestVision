import {getPromise, postPromise} from '~/services/Promise'

export default class Auth {
  static login(email, password) {
    return postPromise('/login', {email, password})
  }

  static register(first_name, last_name, email, password) {
    return postPromise('/users/signup', {first_name, last_name, email, password})
  }

  static loginWithFacebook(token) {
    return postPromise('/users/login/facebook', {token})
  }

  static getDetails() {
    return getPromise('/me');
  }

  static requestResetPassword(email) {
    return postPromise('/password/email', {email});
  }

  static resetPassword(email, password, password_confirmation, token) {
    return postPromise('/password/reset', {email, password, password_confirmation, token})
  }

  static confirmSignup(token) {
    return postPromise('/users/signup/confirm', {token})
  }
}
