import {getPromise} from "../Promise";

export default class Homestay {

  homestays = {
    data: []
  }

  findBySlug(slug){
    return getPromise('/products/homestay/' + slug )
  }

  getAll() {

    return new Promise(async resolve => {

      if (this.homestays.data.length > 0) {
        resolve(this.homestays)
        return;
      }

      this.homestays = await getPromise('/products/homestay?limit=-1&includes=tags,category,prices,media,hosts&filter[status]=published')
      resolve(this.homestays)
    })
  }
}
