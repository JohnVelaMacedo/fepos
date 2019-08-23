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
import Resource from '@/api/resource';
const categoryResource = new Resource('categorias');

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
    onSubmit() {
      this.loading = true;
      categoryResource
        .storeCategory(this.categoria)
        .then(response => {
          this.loading = false;
          this.$message({
            message: 'User information has been updated successfully',
            type: 'success',
            duration: 5 * 1000,
          });
        })
        .catch(error => {
          console.log(error);
          this.loading = false;
        });
    },
    onCancel() {
      this.$message({
        message: 'cancel!',
        type: 'warning',
      });
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

