import Resource from '@/api/resource';

class ProductoResource extends Resource {
  constructor() {
    super('producto');
  }

  // storeCategory(data) {
  //   // console.log(data.code);
  //   this.uri = '/registro';
  //   return super.store(data);
  // }
}

export { ProductoResource as default };
