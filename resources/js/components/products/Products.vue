<template>
<div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Products</h2>
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-md-6 text-center">
                     <h2 class="card-title">All Products</h2>
                 </div>
                 <div class="col-md-6 text-right">
                     <router-link to="/add_product" class="btn btn-primary">Add Product</router-link>
                 </div>
             </div>
         </div>
         <div class="card-body table-responsive">
             <table class="table table-bordered table-sm">
                 <thead>
                     <th>Product Name</th>
                     <th>Description</th>
                     <th>Quantity</th>
                     <th>Action</th>
                 </thead>
                 <tbody>
                     <tr v-for="product in products" :key="product.id">
                         <td>{{ product.name }}</td>
                         <td>{{ product.description }}</td>
                         <td>{{ product.quantity }}</td>
                         <td>
                             <router-link :to="{name:'edit_product', params:{id:product.id}}" class="btn btn-sm btn-success" ><i class="fa fa-pencil"></i></router-link>
                             <a href="" @click.prevent="deleteProduct(product.id)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
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
  name: 'Products',
  created(){
   this.loadData();
  },
  methods: {
      loadData(){
          let url = this.url + '/api/fetch_products';
          this.axios.get(url).then(response =>{
              this.products = response.data
              console.log(this.products);
          });
      },
      deleteProduct(id){
          let url = this.url + `/api/delete_product/${id}`
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
          console.log('Products List Component Mounted!');
      },
  data(){
          return {
              url: '',
              products: []
          }
      }
}
</script>

<style>

</style>