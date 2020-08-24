import Vuex from 'vuex';
import PriceCalculator from "~/services/PriceCalculator";
import {differenceInDays} from 'date-fns'

const createStore = () => {
  return new Vuex.Store({
    state: {
      isAuthenticated: "false",
      user: {},
      cart: {
        products: [],
        checkIn: null,
        checkOut: null
      },
      customerInfo : {
        firstName: '',
        lastName: '',
        email: ''
      },
      isLoading: false,
    },
    mutations: {
      setAuthenticate(state, payload) {
        state.isAuthenticated = payload
      },
      setUser(state, payload) {
        state.user = payload
      },
      logout(state) {
        state.user = {}
        localStorage.setItem('access_token', null)
      },
      addProduct(state, product) {

        let isInCart = false
        state.cart.products.forEach((p, key) => {
          if (p.id == product.id) {
            isInCart = true
          }
        })
        if(!isInCart){
          state.cart.products.push(product)
          localStorage.setItem('cart', JSON.stringify(state.cart))
        }
      },
      removeProduct(state, product) {
        let index = -1
        state.cart.products.forEach((p, key) => {
          if (p.id == product.id) {
            index = key
          }
        })

        if (index !== -1) {
          state.cart.products.splice(index, 1)
        }

        localStorage.setItem('cart', JSON.stringify(state.cart))
      },
      clearCart(state) {
        state.cart = {
          products: [],
          checkIn: null,
          checkOut: null
        }
        localStorage.setItem('cart', JSON.stringify(state.cart))
      },
      setCheckIn(state, date) {
        state.cart.checkIn = date
        localStorage.setItem('cart', JSON.stringify(state.cart))
      },
      setCheckOut(state, date) {
        state.cart.checkOut = date
        localStorage.setItem('cart', JSON.stringify(state.cart))
      },
      productPaxSelected(state, {pax, product}) {

        let index = -1
        state.cart.products.forEach((p, key) => {
          if (p.id == product.id) {
            index = key
          }
        })
        if (index !== -1) {
          state.cart.products[index].selectedPax = pax
        }

        localStorage.setItem('cart', JSON.stringify(state.cart))
      }
    },
    actions: {
      setAuthenticate(context, payload) {
        context.commit('setAuthenticate', payload)
      },
      setUser(context, payload) {
        context.commit("setUser", payload);
      },
      logout(context) {
        context.commit("logout");
      },
      addProduct(context, payload) {
        context.commit("addProduct", payload);
      },
      removeProduct(context, payload) {
        context.commit("removeProduct", payload);
      },
      setCheckIn(context, payload) {
        context.commit("setCheckIn", payload);
      },
      setCheckOut(context, payload) {
        context.commit("setCheckOut", payload);
      },
      clearCart(context) {
        context.commit("clearCart");
      },
      markPrimaryCheckout(context, payload) {
        context.commit('setPrimaryCheckout', payload);
      },
      productPaxSelected(context, payload) {
        context.commit('productPaxSelected', payload)
      }
    },
    getters: {
      auth(state) {
        return state.user
      },
      isAuthenticated(state) {
        return state.isAuthenticated;
      },
      cartProducts(state, getters) {
        return getters.cart.products
      },
      cart(state) {
        let cart = state.cart
        if (!state.cart.products.length && localStorage.getItem('cart')) {
          cart = JSON.parse(localStorage.getItem('cart'))
          state.cart = cart
        }

        return cart
      },
      cartCheckInDate(state, getters) {
        let checkIn = getters.cart.checkIn

        if (typeof checkIn === 'string') {
          return new Date(checkIn)
        }
        return checkIn
      },
      cartCheckOutDate(state, getters) {
        let checkOut = getters.cart.checkOut
        if(!checkOut){
          return getters.checkIn
        }
        if (typeof checkOut === 'string') {
          return new Date(checkOut)
        }
        return checkOut
      },
      isPrimaryHomestayCheckout(state) {
        let [firstProduct] = state.cart.products
        return firstProduct && firstProduct.category && firstProduct.category.slug === 'homestay'
      },
      isExperienceHomestayCheckout(state) {
        let [firstProduct] = state.cart.products
        return firstProduct && firstProduct.category && firstProduct.category.slug !== 'homestay'
      },
      totalBookingCost(state, getters) {

        let total = 0;
        const checkIn = state.cart.checkIn
        const checkOut = state.cart.checkOut

        const calculator = new PriceCalculator();
        getters.cartProducts.forEach(product => {

          if (product) {
            const [USDPrice] = product.prices.filter(p => p.currency === "USD");
            if (product.category.slug === 'homestay') {
              total += (calculator.getPriceForPax(USDPrice, product.selectedPax) * differenceInDays(checkOut, checkIn));
            } else {
              total += calculator.getPriceForPax(USDPrice, product.selectedPax);
            }
          }
        })
        return total;
      }
    }
  })
}

export default createStore;



