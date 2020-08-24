import {getPromise, postPromise} from "../Promise";

export default class Cms {

  static findByKey(key){
    return getPromise('/cms/' + key)
  }

  static subscribe(email){
    return postPromise('/users/subscribe', {email})
  }

}
