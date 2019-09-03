<template>
  <div class="app-container">
    <el-row :gutter="24">
      <el-col :xs="24" :sm="24" :md="14" style="overflow: auto">
        <div class="grid-content">
          <el-container>
            <el-header>
              <search />
            </el-header>
            <el-main style="height: 76vh; overflow-y: scroll; margin-top: 10px">
              <products />
            </el-main>
          </el-container>
        </div>
      </el-col>
      <el-col :xs="24" :sm="24" :md="10" style="margin-top: 10px;">
        <div class="grid-content">
          <el-container>
            <el-main>
              <shopping-cart />
            </el-main>
          </el-container>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import Search from './components/Search';
import Productos from './components/Productos';
import CarritoCompras from './components/CarritoCompras';

export default {
  name: 'PagePOS',
  components: {
    Search,
    'products': Productos,
    'shopping-cart': CarritoCompras,
  },
  data() {
    return {
      activeIndex: '1',
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    },
  },
};
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.app-container {
  background-color: #f0f2f5;
}
</style>
