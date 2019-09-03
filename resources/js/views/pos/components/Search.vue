<template>
  <div>
    <el-card shadow="always" :body-style="{ padding: '10px' }">
      <el-input
        v-model="search"
        prefix-icon="el-icon-search"
        placeholder="Buscar Productos"
        clearable
      />
    </el-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: '',
    };
  },
  methods: {},
};
</script>

<style>
</style>
