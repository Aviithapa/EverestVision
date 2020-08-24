import {postPromise, patchPromise} from "../Promise"

export default class Booking{

  save(booking) {
    if(booking.id){
      return patchPromise('/product-bookings/' + booking.id, booking)
    }
    return postPromise('/product-bookings', booking)
  }

  payWithStripe(booking, stripeToken){

    booking.stripeToken = stripeToken
    return postPromise('/bookings/pay/stripe', booking)
  }

  static getPaypalPayurl(id){
    return process.env.apiBaseUrl + '/bookings/pay/paypal';
  }

  static paypalLoadingUrl(){
    return process.env.apiBaseUrl + '/bookings/initiate/paypal';
  }

  static checkAvailabiity(booking){
    return postPromise('/bookings/price', booking)
  }
}
