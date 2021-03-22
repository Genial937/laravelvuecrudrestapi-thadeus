<template>
  <div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Contact Page</h2>
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-6">
                      <h2>All Orders</h2>
                  </div>
                  <div class="col-md-6 text-right">
                      <router-link to="/add_order" class="btn btn-primary">Add Order</router-link>
                  </div>
              </div>
          </div>
          <div class="card-body">
              <table class="table table-sm table-border">
                  <thead>
                      <th>Order Number</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                      <tr v-for="order in orders" :key="order.id">
                          <td>{{ order.order_number }}</td>
                          <td>
                              <a href="" class="btn btn-danger btn-sm" @click.prevent="deleteSupplier(order.id)"><i class="fa fa-trash-o"></i></a>
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
 name: 'Orders',
 created(){
   this.loadData();
  },
  methods: {
      loadData(){
          let url = this.url + '/api/fetch_orders';
          this.axios.get(url).then(response =>{
              this.orders = response.data
              console.log(this.orders);
          });
      },
      deleteSupplier(id){
          let url = this.url + `/api/delete_order/${id}`
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
          console.log('Order List Component Mounted!');
      },
  data(){
          return {
              url: document.head.querySelector('meta[name="url"]').content,
              orders: []
          }
      }
}
</script>

<style>

</style>