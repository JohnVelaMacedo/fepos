<template>
  <div class="app-container">
    <el-table
      v-loading="listLoading"
      :data="list"
      border
      fit
      highlight-current-row
      style="width: 100%"
    >
      <el-table-column align="center" label="Código" width="100">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.code }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.code" size="small" />
            <!-- <el-button class="cancel-btn" size="small" icon="el-icon-refresh" type="warning" @click="cancelEdit(row)">
              cancel
            </el-button>-->
          </template>
          <span v-else>{{ row.code }}</span>
        </template>
      </el-table-column>

      <el-table-column width="250px" align="center" label="Nombre">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.name" size="small" />
          </template>
          <span v-else>{{ row.name }}</span>
        </template>
      </el-table-column>

      <el-table-column label="Actions" width="200" class-name="small-padding ">
        <template slot-scope="{row}">
          <el-button
            v-if="row.edit"
            class="cancel-btn"
            size="mini"
            icon="el-icon-refresh"
            type="warning"
            @click="cancelEdit(row)"
          >cancel</el-button>
          <el-button
            v-if="row.edit"
            type="success"
            size="mini"
            icon="el-icon-circle-check-outline"
            @click="confirmEdit(row)"
          >Ok</el-button>
          <el-button
            v-else
            type="primary"
            size="mini"
            icon="el-icon-edit"
            @click="row.edit = toggleEdit()"
          >Edit</el-button>
          <el-button
            v-if="!row.edit"
            size="mini"
            icon="el-icon-delete"
            type="danger"
            @click="eliminar(row)"
          >Eliminar</el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
// import { fetchList } from '@/api/article';
import CategoryResource from '@/api/category';
const categoryResource = new CategoryResource('categorias');

export default {
  name: 'InlineEditTable',
  filters: {
    statusFilter(status) {
      const statusMap = {
        published: 'success',
        draft: 'info',
        deleted: 'danger',
      };
      return statusMap[status];
    },
  },
  data() {
    return {
      list: null,
      editar: false,
      listLoading: true,
      listQuery: {
        all: true,
      },
    };
  },
  created() {
    this.getList();
  },
  methods: {
    async getList() {
      this.listLoading = true;
      const { data } = await categoryResource.list(this.listQuery);
      // console.table(data.items);
      const items = data.items;
      this.list = items.map(v => {
        this.$set(v, 'edit', false); // https://vuejs.org/v2/guide/reactivity.html
        v.originalCode = v.code; //  will be used when user click the cancel botton
        v.originalName = v.name;
        return v;
      });
      this.listLoading = false;
    },
    toggleEdit() {
      if (this.editar) {
        return false;
      } else {
        this.editar = true;
        return true;
      }
    },
    cancelEdit(row) {
      // console.log(row);
      row.code = row.originalCode;
      row.name = row.originalName;
      row.edit = false;
      this.editar = false;
      // this.getList();
      this.$message({
        message: 'Acción cancelada',
        type: 'warning',
      });
    },
    confirmEdit(row) {
      const data = {
        id: row.id,
        code: row.code,
        name: row.name,
      };
      categoryResource
        .update(data.id, data)
        .then(response => {
          this.$message({
            message: 'Registro guardado!',
            type: 'success',
          });
        })
        .catch(error => {
          console.log(error);
        });
      row.edit = false;
      this.editar = false;
    },
    eliminar(row) {
      this.$confirm(
        'Esta acción eliminará el registro. ¿Desea continuar?',
        'Alerta',
        {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancelar',
          type: 'warning',
        }
      )
        .then(() => {
          console.log(row.id);
          categoryResource
            .destroy(row.id)
            .then(response => {
              this.$message({
                type: 'success',
                message: 'Registro eliminado',
              });
              this.getList();
            })
            .catch(error => {
              console.log(error);
            });
        })
        .catch(() => {
          this.$message({
            type: 'info',
            message: 'Acción cancelada',
          });
        });
    },
  },
};
</script>

<style scoped>
.edit-input {
  padding-right: 100px;
}
.cancel-btn {
  position: absolute;
  right: 15px;
  top: 10px;
}
</style>
