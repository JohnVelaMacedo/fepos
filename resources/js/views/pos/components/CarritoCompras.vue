<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <search-carrito />
      </div>
      <div style="width: 100%">
        <carrito />
      </div>
    </el-card>
  </div>
</template>

<script>
import SearchCarrito from './sub-components/SearchCarrito';
import Carrito from './sub-components/Carrito';

export default {
  components: {
    'search-carrito': SearchCarrito,
    Carrito,
  },
  data() {
    return {};
  },
  methods: {
    addHeader({ row, rowIndex }) {
      console.log('Row');
      console.log(row);
      console.log('RowIndex');
      console.log(rowIndex);
    },
  },
};
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.text {
  font-size: 14px;
}

.item {
  margin-bottom: 18px;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: '';
}
.clearfix:after {
  clear: both;
}

.box-card {
  width: 100%;
}

.el-card__body {
  padding: 10px 10px 8px 10px!important;
}
</style>
