import Resource from '@/api/resource';

class CategoryResource extends Resource {
  constructor() {
    super('categoria');
  }

  // storeCategory(data) {
  //   // console.log(data.code);
  //   this.uri = '/registro';
  //   return super.store(data);
  // }
}

export { CategoryResource as default };
