<template>
<div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Suppliers</h2>
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-md-6 text-center">
                     <h2 class="card-title">All Suppliers</h2>
                 </div>
                 <div class="col-md-6 text-right">
                     <router-link to="/add_suppliers" class="btn btn-primary">Add Supplier</router-link>
                 </div>
             </div>
         </div>
         <div class="card-body table-responsive">
             <table class="table table-bordered table-sm">
                 <thead>
                     <th>Name</th>
                     <th>Action</th>
                 </thead>
                 <tbody>
                     <tr v-for="supplier in suppliers" :key="supplier.id">
                         <td>{{ supplier.name }}</td>
                         <td>
                             <router-link :to="{name:'edit_supplier', params:{id:supplier.id}}" class="btn btn-sm btn-success" ><i class="fa fa-pencil"></i></router-link>
                             <a href="" class="btn btn-sm btn-danger" @click.prevent="deleteSupplier(supplier.id)"><i class="fa fa-trash-o"></i></a>
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
  name: 'Supplier',
  created(){
   this.loadData();
  },
  methods: {
      loadData(){
          let url = this.url + '/api/fetch_suppliers';
          this.axios.get(url).then(response =>{
              this.suppliers = response.data
              console.log(this.suppliers);
          });
      },
      deleteSupplier(id){
          let url = this.url + `/api/delete_supplier/${id}`
          this.axios.delete(url).then(response=>{
              if (response.status) {
                  this.loadData();
                  this.$utils.showSuccess('success', response.message);
              } else {
                   this.$utils.showError('Error', response.message);
              }
          });
      }
      },
  mounted(){
          console.log('Supplier List Component Mounted!');
      },
  data(){
          return {
              url: '',
              suppliers: []
          }
      }
}
</script>

<style>

</style>