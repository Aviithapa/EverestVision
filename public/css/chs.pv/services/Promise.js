import axios from 'axios'

const baseUrl = process.env.apiBaseUrl;

function getPromise(url) {
  return new Promise((resolve, reject) => {
    axios.get(baseUrl + url)
      .then(response => resolve(response.data))
      .catch(error => reject(error))
  })
}

function patchPromise(url, data) {
  return new Promise((resolve, reject) => {
    axios.patch(baseUrl + url, data)
      .then(response => resolve(response.data))
      .catch(error => reject(error))
  })
}


function postPromise(url, data) {
  return new Promise((resolve, reject) => {
    axios.post(baseUrl + url, data)
      .then(response => resolve(response.data))
      .catch(error => reject(error))
  })
}

function deletePromise(url) {

  return new Promise((resolve, reject) => {
    axios.delete(baseUrl + url)
      .then(response => resolve(response.data))
      .catch(error => reject(error))
  })
}


export { getPromise, postPromise, patchPromise, deletePromise }
