import Resource from '@/api/resource';

class CategoryResource extends Resource {
  constructor() {
    super('categorias');
  }

  storeCategory(data) {
    this.uri += '/registro';
    return super.store(data);
  }
}

export { CategoryResource as default };
