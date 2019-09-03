<template>
  <div class="app-container">
    <el-row>
      <el-card class="box-card">
        <div slot="header" class="clearfix">
          <span class="demonstration">Agregar Nueva Categoria</span>
        </div>
        <el-form ref="form" :model="categoria">
          <el-col :xs="24" :md="18" :lg="18" style="display: table; margin: 0 auto;">
            <el-form-item label="Código">
              <el-input
                v-model="categoria.code"
                size="medium"
                placeholder="Código de Producto"
                clearable
              />
            </el-form-item>
            <el-form-item label="Nombre">
              <el-input
                v-model="categoria.name"
                size="medium"
                placeholder="Nombre de Producto"
                clearable
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
const categoryResource = new CategoryResource('categorias');

export default {
  name: 'RegistroProductos',
  components: {},
  data() {
    return {
      categoria: {
        id: null,
        code: null,
        name: null,
      },
    };
  },
  mounted() {},
  methods: {
    limpiar() {
      this.categoria = {
        id: null,
        code: null,
        name: null,
      };
    },
    onSubmit() {
      this.loading = true;
      categoryResource
        .store(this.categoria)
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
    onCancel() {
      this.limpiar();
      // this.$message({
      //   message: 'cancel!',
      //   type: 'warning',
      // });
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

