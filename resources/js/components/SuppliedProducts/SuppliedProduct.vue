<template>
  <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Supplied Products</h2>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h2 class="card-title">All Supplied Products</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <router-link to="/add_supplied_product" class="btn btn-primary">Add Supplied Product</router-link>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>Product</th>
                        <th>Supplier</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr v-for="supply in supplies" :key="supply.id">
                            <td>{{ supply.product_name }}</td>
                            <td>{{ supply.supplier }}</td>
                            <td>
                                <router-link :to="{name:'view_supply', params:{id:supply.id}}" class="btn btn-sm btn-success" ><i class="fa fa-eye"></i></router-link>
                                <a href="" class="btn btn-sm btn-danger" @click.prevent="deleteSupply(supply.id)"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</template>

<script>
export default {
 name: 'SuppliedProduct',
 created(){
   this.loadData();
  },
  methods: {
      loadData(){
          let url = this.url + '/api/fetch_supplies';
          this.axios.get(url).then(response =>{
              console.log(response);
              this.supplies = response.data
          }).catch(error=>{
                  this.errors.push(error.response.data.message);
              });
      },
      deleteSupply(id){
          let url = this.url + `/api/delete_supply/${id}`
          this.axios.delete(url).then(response=>{
              if (response.status) {
                  this.loadData();
                  this.$utils.showSuccess('success', response.message);
              } else {
                   this.$utils.showError('Error', response.message);
              }
          }).catch(error=>{
                  this.errors.push(error.response.data.message);
              });;
      }
      },
  mounted(){
          console.log('Supplied products List Component Mounted!');
      },
  data(){
          return {
              url: document.head.querySelector('meta[name="url"]').content,
              supplies: [],
              errors:[]
          }
      }
}
</script>

<style scoped>

</style>