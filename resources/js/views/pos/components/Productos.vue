<template>
  <div>
    <el-row :gutter="24">
      <el-col v-for="i in 16" :key="i" :xs="24" :sm="12" :md="6">
        <el-card class="box-card" shadow="always" :body-style="{ padding: '0px' }">
          <img src="https://source.unsplash.com/random" class="image">
          <div style="padding: 14px">
            <span>Card name {{ i }}</span>
          </div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {},
};
</script>

<style>
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
  margin-top: 10px;
}

.image {
	width: 100%;
	height: 30vh;
}
</style>
