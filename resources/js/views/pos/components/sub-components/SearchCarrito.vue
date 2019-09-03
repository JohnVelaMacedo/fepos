<template>
  <div>
    <el-row :gutter="24">
      <el-col :span="18">
        <el-input
          v-model="input"
          placeholder="Buscar clientes"
          clearable
          prefix-icon="el-icon-search"
        />
      </el-col>
      <el-col :span="6">
        <el-button type="info" icon="el-icon-plus" plain />
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      input: '',
    };
  },
};
</script>

<style>
</style>
