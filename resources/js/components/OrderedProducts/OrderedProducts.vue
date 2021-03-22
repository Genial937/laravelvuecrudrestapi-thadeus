<template>
<div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Ordered Products</h2>
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-md-6 text-left">
                     <h2 class="card-title">Ordered Products List</h2>
                 </div>
                 <div class="col-md-6 text-right">
                     <router-link to="/add_ordered_products" class="btn btn-primary">Add Order </router-link>
                 </div>
             </div>
         </div>
         <div class="card-body">
             <table class="table table-sm">
                 <thead>
                     <th>Order Number</th>
                     <th>Product</th>
                     <th>Action</th>
                 </thead>
                 <tbody>
                     <tr v-for="detail in details" :key="detail.detail_id">
                         <td>{{ detail.order_no }}</td>
                         <td>{{ detail.product_name }}</td>
                         <td>
                             <router-link :to="{name:'view_order_details', params:{id:detail.detail_id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></router-link>
                             <a href="" @click.prevent="deleteDetail(detail.detail_id)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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
  name: 'OrderedProducts',
  created(){
   this.loadData();
  },
  methods: {
      loadData(){
          let url = this.url + '/api/fetch_order_details';
          this.axios.get(url).then(response =>{
              this.details = response.data
              console.log(this.details);
          });
      },
      deleteDetail(id){
          let url = this.url + `/api/delete_order_detail/${id}`
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
              details: []
          }
      }
}
</script>

<style>

</style>