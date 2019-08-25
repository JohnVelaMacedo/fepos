<template>
  <div style="width: 100%">
    <div style="overflow-y: scroll; height: 20vh;">
      <div v-if="tableData.length == 0" style="height: 100%">
        <el-row type="flex" justify="center">
          <el-col :span="6" :offset="2" style="margin-top: 50px">
            <span style="color: #808182;">Carro Vacío</span>
          </el-col>
        </el-row>
      </div>
      <div v-else style="padding: 10px; font-size: 13px;">
        <el-row
          v-for="(i, index) in tableData"
          :key="index"
          :gutter="24"
          style="margin-right: 0px; border-bottom: 1px solid #dfe0e2; padding: 10px"
        >
          <el-col :span="10">{{ i.name }}</el-col>
          <el-col :span="6">asd</el-col>
          <el-col :span="6">asd</el-col>
          <el-col :span="2">asd</el-col>
        </el-row>
      </div>
    </div>
    <div style="margin-top: 20px; width: 100%">
      <div style="padding: 15px;">
        <el-row
          v-for="(i, index) in tableData2"
          :key="index"
          :gutter="24"
          style="border-top: 1px solid #dfe0e2; padding: 8px; color: #808182; font-size: 14px"
        >
          <el-col :span="20" style="padding: 0px">
            <span :style="{ fontWeight: i.hasFontWeight ? 'bold' : '' }">{{ i.name }}</span>
          </el-col>
          <el-col :span="4" style="text-align: right; padding: 0px">
            <span :style="{ fontWeight: i.hasFontWeight ? 'bold' : '' }">S/. {{ i.total }}</span>
          </el-col>
        </el-row>
      </div>
      <div style="margin: 10px 0; padding: 10px 0">
        <el-row>
          <el-button type="info" style="width: 100%">Info</el-button>
        </el-row>
      </div>
      <div align="center" style="border-top: 1px solid #dfe0e2; padding: 0px 10px 0px;">
        <el-row :gutter="24">
          <el-col :span="8" class="link-carrito-refresh">
            <el-badge value>
              <el-link
                type="info"
                class="link-carrito-refresh-link"
                style="font-size: 20px;"
                :underline="false"
                disabled
              >
                <i class="el-icon-refresh-left" />
              </el-link>
            </el-badge>
          </el-col>
          <el-col :span="8" class="link-carrito-stop">
            <el-link
              type="warning"
              class="link-carrito-stop-link"
              style="font-size: 20px;"
              :underline="false"
            >I I</el-link>
          </el-col>
          <el-col :span="8" class="link-carrito-delete">
            <el-link
              type="danger"
              class="link-carrito-delete-link"
              style="font-size: 20px;"
              :underline="false"
            >
              <i class="el-icon-delete" />
            </el-link>
          </el-col>
        </el-row>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tableData: [],
      tableData2: [
        { name: 'Sub Total', total: 0, hasFontWeight: true },
        { name: 'Tax', total: 0, hasFontWeight: false },
        { name: 'Total', total: 0, hasFontWeight: true },
      ],
      valueBadge: '',
    };
  },
};
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.el-table__header-wrapper {
  display: none;
}

.el-table--scrollable-x .el-table__body-wrapper {
  overflow-x: inherit;
}

.el-card__body {
  padding: 10px 10px 8px 10px !important;
}

.link-carrito-stop,
.link-carrito-refresh,
.link-carrito-delete {
  transition: 0.2s ease-in-out;
  height: 100%;
  padding: 10px 0;
  cursor: pointer;
}

.link-carrito-refresh:hover {
  background-color: #909399;

  & .link-carrito-refresh-link {
    color: white;
  }
}

.link-carrito-stop:hover {
  background-color: #e6a23c;

  & .link-carrito-stop-link {
    color: white;
  }
}

.link-carrito-delete:hover {
  background-color: #f56c6c;

  & .link-carrito-delete-link {
    color: white;
  }
}
</style>
