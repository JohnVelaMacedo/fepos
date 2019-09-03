<template>
  <div class="app-container">
    <el-table
      v-loading="listLoading"
      :data="list"
      stripe
      fit
      height="500"
      highlight-current-row
      style="width: 100%"
    >
      <el-table-column align="center" label="Código" width="70">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.code }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.code" size="mini" />
            <!-- <el-button class="cancel-btn" size="small" icon="el-icon-refresh" type="warning" @click="cancelEdit(row)">
              cancel
            </el-button>-->
          </template>
          <span v-else>{{ row.code }}</span>
        </template>
      </el-table-column>

      <el-table-column width="270px" align="center" label="Nombre">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.name" size="mini" />
          </template>
          <span v-else>{{ row.name }}</span>
        </template>
      </el-table-column>

      <el-table-column width="70px" align="center" label="Unidad">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.unit" size="mini" />
          </template>
          <span v-else>{{ row.unit }}</span>
        </template>
      </el-table-column>

      <el-table-column width="70px" align="center" label="Tam.">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.size" size="mini" />
          </template>
          <span v-else>{{ row.size }}</span>
        </template>
      </el-table-column>

      <el-table-column width="70px" align="center" label="Costo">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cost" size="mini" />
          </template>
          <span v-else>{{ row.cost }}</span>
        </template>
      </el-table-column>

      <el-table-column width="70px" align="center" label="Precio">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.price" size="mini" />
          </template>
          <span v-else>{{ row.price }}</span>
        </template>
      </el-table-column>

      <el-table-column width="70px" align="center" label="Alert. Cant">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.alert_quantity" size="mini" />
          </template>
          <span v-else>{{ row.alert_quantity }}</span>
        </template>
      </el-table-column>

      <el-table-column width="160px" align="center" label="Categoria">
        <template slot-scope="{row}">
          <template v-if="row.edit">
            <el-autocomplete
              v-model="row.category_name"
              :fetch-suggestions="querySearchAsync"
              placeholder="Categoría Producto"
              :trigger-on-focus="false"
              clearable
              size="mini"
              @select="(e)=>handleSelect(e,row)"
            />
          </template>
          <span v-else>{{ row.category_name }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Subcategoria">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.subcategory_id" size="mini" />
          </template>
          <span v-else>{{ row.subcategory_id }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Cant.">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.quantiy" size="mini" />
          </template>
          <span v-else>{{ row.quantiy }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Taza">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.tax_rate" size="mini" />
          </template>
          <span v-else>{{ row.tax_rate }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Seg. Cant.">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.track_quantity" size="mini" />
          </template>
          <span v-else>{{ row.track_quantity }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Detalles">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.details" size="mini" />
          </template>
          <span v-else>{{ row.details }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="CF1">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cf1" size="mini" />
          </template>
          <span v-else>{{ row.cf1 }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="CF2">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cf2" size="mini" />
          </template>
          <span v-else>{{ row.cf2 }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="CF3">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cf3" size="mini" />
          </template>
          <span v-else>{{ row.cf3 }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="CF4">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cf4" size="mini" />
          </template>
          <span v-else>{{ row.cf4 }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="CF5">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cf5" size="mini" />
          </template>
          <span v-else>{{ row.cf5 }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="CF6">
        <template slot-scope="{row}">
          <!-- <span>{{ scope.row.name }}</span> -->
          <template v-if="row.edit">
            <el-input v-model="row.cf6" size="mini" />
          </template>
          <span v-else>{{ row.cf6 }}</span>
        </template>
      </el-table-column>

      <el-table-column label="Acciones" fixed="right" width="130" class-name="small-padding ">
        <template slot-scope="{row}">
          <el-button
            v-if="row.edit"
            type="success"
            size="mini"
            icon="el-icon-check"
            @click="confirmEdit(row)"
          />
          <el-button
            v-if="row.edit"
            size="mini"
            icon="el-icon-close"
            type="warning"
            @click="cancelEdit(row)"
          />
          <el-button
            v-else
            type="primary"
            size="mini"
            icon="el-icon-edit"
            @click="row.edit = toggleEdit()"
          />
          <el-button
            v-if="!row.edit"
            size="mini"
            icon="el-icon-delete"
            type="danger"
            @click="eliminar(row)"
          />
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
// import { fetchList } from '@/api/article';
import CategoryResource from '@/api/category';
import ProductoResource from '@/api/producto';
const productoResource = new ProductoResource('productos');
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
      links: [],
      list: null,
      editar: false,
      listLoading: true,
      listQuery: {
        all: null,
        like: null,
      },
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
        category_name: null,
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
  created() {
    this.getList();
  },
  methods: {
    async getList() {
      this.listLoading = true;
      this.listQuery.all = true;
      const { data } = await productoResource.list(this.listQuery);
      // console.table(data.items);
      const items = data.items;
      this.list = items.map(v => {
        this.$set(v, 'edit', false); // https://vuejs.org/v2/guide/reactivity.html
        v.originalCode = v.code; //  will be used when user click the cancel botton
        v.originalName = v.name;
        v.originalUnit = v.unit;
        v.originalSize = v.size;
        v.originalCost = v.cost;
        v.originalPrice = v.price;
        v.originalAlertQ = v.alert_quantity;
        v.originalCategoryID = v.category_id;
        v.originalCategoryN = v.category_name;
        v.originalSubcategoryID = v.subcategory_id;
        v.originalQuantity = v.quantity;
        v.originalTaxR = v.tax_rate;
        v.originalTrackQ = v.track_quantity;
        v.originalDetails = v.details;
        v.originalCF1 = v.cf1;
        v.originalCF2 = v.cf2;
        v.originalCF3 = v.cf3;
        v.originalCF4 = v.cf4;
        v.originalCF5 = v.cf5;
        v.originalCF6 = v.cf6;
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
      //   console.log(row);
      row.code = row.originalCode;
      row.name = row.originalName;
      row.unit = row.originalUnit;
      row.size = row.originalSize;
      row.cost = row.originalCost;
      row.price = row.originalPrice;
      row.alert_quantity = row.originalAlertQ;
      row.category_id = row.originalCategoryID;
      row.category_name = row.originalCategoryN;
      row.subcategory_id = row.originalSubcategoryID;
      row.quantity = row.originalQuantity;
      row.tax_rate = row.originalTaxR;
      row.track_quantity = row.originalTrackQ;
      row.details = row.originalDetails;
      row.cf1 = row.originalCF1;
      row.cf2 = row.originalCF2;
      row.cf3 = row.originalCF3;
      row.cf4 = row.originalCF4;
      row.cf5 = row.originalCF5;
      row.cf6 = row.originalCF6;
      row.edit = false;
      this.editar = false;
      // this.getList();
      this.$message({
        message: 'Acción cancelada',
        type: 'warning',
      });
    },
    confirmEdit(row) {
      //   Object.keys(this.producto).forEach((k, i) => {
      //     this.producto[k] = row[k];
      //   });
      productoResource
        .update(row.id, row)
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
    querySearchAsync(queryString, cb) {
      //   console.log(queryString);
      if (queryString.length > 1) {
        this.listQuery.like = [queryString];
        this.listQuery.all = null;
        categoryResource
          .list(this.listQuery)
          .then(response => {
            if (response.items) {
              var results = response.items;
              clearTimeout(this.timeout);
              this.timeout = setTimeout(() => {
                cb(results);
              }, 500 * Math.random());
            }
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    handleSelect(e, row) {
      //   console.log(e, row);
      row.category_id = e.link;
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
          //   console.log(row.id);
          productoResource
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
