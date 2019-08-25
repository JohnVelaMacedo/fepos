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
                v-model="producto.category_id"
                :fetch-suggestions="querySearchAsync"
                placeholder="Categoría del Prodcto"
                :trigger-on-focus="false"
                clearable
                @select="handleSelect"
              />
            </el-form-item>
            <el-form-item>
              <el-button type="primary" @click="onSubmit">Create</el-button>
              <el-button @click="onCancel">Cancel</el-button>
            </el-form-item>
          </el-col>
        </el-form>
      </el-card>
    </el-row>
  </div>
</template>

<script>
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
    };
  },
  mounted() {
    this.links = this.loadAll();
  },
  methods: {
    onSubmit() {
      this.$message('submit!');
    },
    onCancel() {
      this.$message({
        message: 'cancel!',
        type: 'warning',
      });
    },
    loadAll() {
      return [
        { value: 'vue', link: 'https://github.com/vuejs/vue' },
        { value: 'element', link: 'https://github.com/ElemeFE/element' },
        { value: 'cooking', link: 'https://github.com/ElemeFE/cooking' },
        { value: 'mint-ui', link: 'https://github.com/ElemeFE/mint-ui' },
        { value: 'vuex', link: 'https://github.com/vuejs/vuex' },
        { value: 'vue-router', link: 'https://github.com/vuejs/vue-router' },
        { value: 'babel', link: 'https://github.com/babel/babel' },
      ];
    },
    querySearchAsync(queryString, cb) {
      var links = this.links;
      var results = queryString
        ? links.filter(this.createFilter(queryString))
        : links;

      clearTimeout(this.timeout);
      this.timeout = setTimeout(() => {
        cb(results);
      }, 3000 * Math.random());
    },
    createFilter(queryString) {
      return link => {
        return (
          link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0
        );
      };
    },
    handleSelect(item) {
      console.log(item);
    },
  },
};
</script>

<style scoped>
.line {
  text-align: center;
}
</style>

