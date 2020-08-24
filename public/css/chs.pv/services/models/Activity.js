import { getPromise } from "../Promise";


export default class {


  findByHomestayId(id) {
    let url = '/products/activities?limit=-1&includes=category,timeSlots,prices&filter[status]=published&filter[parent_id]=' + id;
    return getPromise(url)
  }

  getAll() {
    let url = '/products/activities?includes=prices,category,media&filter[status]=published&limit=-1';
    return getPromise(url)
  }

  findBySlug(slug) {
    return getPromise("/products/activities/" + slug + "?includes=category");
  }

}
