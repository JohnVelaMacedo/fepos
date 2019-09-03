<template>
  <div class="app-container">
    <el-row>
      <el-card class="box-card">
        <div slot="header" class="clearfix">
          <span class="demonstration">Agregar Nuevo Producto</span>
        </div>
        <el-form ref="form" :model="producto" label-width="100px">
          <el-col :xs="24" :md="14" :lg="12" style="display: table; margin: 0 auto;">
            <el-form-item label="Código">
              <el-input
                v-model="producto.code"
                size="medium"
                placeholder="Código de Producto"
                clearable
              />
            </el-form-item>
            <el-form-item label="Nombre">
              <el-input
                v-model="producto.name"
                size="medium"
                placeholder="Nombre de Producto"
                clearable
              />
            </el-form-item>
            <el-form-item label="Unidad">
              <el-input
                v-model="producto.unit"
                size="medium"
                placeholder="Unidad de Producto"
                clearable
              />
            </el-form-item>
            <el-form-item label="Tamaño">
              <el-input
                v-model="producto.size"
                size="medium"
                placeholder="Tamaño de Producto"
                clearable
              />
            </el-form-item>
            <el-form-item label="Precio">
              <el-input-number
                v-model="producto.price"
                controls-position="right"
                :min="0"
                :max="100000"
                size="medium"
              />
            </el-form-item>
            <el-form-item label="Cant. de Alerta">
              <el-input-number
                v-model="producto.alert_quantity"
                controls-position="right"
                :min="0"
                :step="10"
                size="medium"
              />
            </el-form-item>
            <el-form-item label="Categoría">
              <el-autocomplete
                v-model="producto.category_name"
                :fetch-suggestions="querySearchAsync"
                placeholder="Categoría del Producto"
                :trigger-on-focus="false"
                clearable
                @select="handleSelect"
              />
            </el-form-item>
            <el-form-item>
              <el-button type="primary" @click="onSubmit">Guardar</el-button>
              <el-button @click="onCancel">Cancelar</el-button>
            </el-form-item>
          </el-col>
        </el-form>
      </el-card>
    </el-row>
  </div>
</template>

<script>
import CategoryResource from '@/api/category';
import ProductoResource from '@/api/producto';
const categoryResource = new CategoryResource('categorias');
const productoResource = new ProductoResource('productos');

export default {
  name: 'RegistroProductos',
  components: {},
  data() {
    return {
      links: [],
      state: '',
      timeout: null,
      producto: {
        id: null,
        code: null,
        name: null,
        unit: null,
        size: null,
        cost: null,
        price: null,
        alert_quantity: null,
        image: null,
        category_name: null,
        category_id: null,
        subcategory_id: null,
        cf1: null,
        cf2: null,
        cf3: null,
        cf4: null,
        cf5: null,
        cf6: null,
        quantity: null,
        tax_rate: null,
        track_quantity: null,
        details: null,
      },
      listQuery: {
        page: 1,
        limit: -1,
        like: null,
      },
    };
  },
  mounted() {
    // this.links = this.loadAll();
  },
  methods: {
    onSubmit() {
      this.loading = true;
      productoResource
        .store(this.producto)
        .then(response => {
          this.loading = false;
          this.$message({
            message: 'Categoría Guardada',
            type: 'success',
            duration: 5 * 1000,
          });
          this.limpiar();
        })
        .catch(error => {
          console.log('Error: ', error);
          this.loading = false;
        });
    },
    limpiar() {
      this.producto = {
        id: null,
        code: null,
        name: null,
        unit: null,
        size: null,
        cost: null,
        price: null,
        alert_quantity: null,
        image: null,
        category_name: null,
        category_id: null,
        subcategory_id: null,
        cf1: null,
        cf2: null,
        cf3: null,
        cf4: null,
        cf5: null,
        cf6: null,
        quantity: null,
        tax_rate: null,
        track_quantity: null,
        details: null,
      };
    },
    onCancel() {
      this.$message({
        message: 'cancel!',
        type: 'warning',
      });
    },
    querySearchAsync(queryString, cb) {
      // var links = this.links;
      // console.log(links);
      // var results = queryString
      //   ? links.filter(this.createFilter(queryString))
      //   : links;
      if (queryString.length > 1) {
        this.listQuery.like = [queryString];
        categoryResource
          .list(this.listQuery)
          .then(response => {
            if (response.items) {
              var results = response.items;
              clearTimeout(this.timeout);
              this.timeout = setTimeout(() => {
                cb(results);
              }, 500 * Math.random());
            }
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    createFilter(queryString) {
      return link => {
        return (
          link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0
        );
      };
    },
    handleSelect(item) {
      this.producto.category_id = '' + item.link;
      // console.log(this.producto);
    },
  },
};
</script>

<style scoped>
.line {
  text-align: center;
}
</style>

