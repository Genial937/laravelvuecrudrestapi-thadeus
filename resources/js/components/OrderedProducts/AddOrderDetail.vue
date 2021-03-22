<template>
  <div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Add Ordered Product</h2>
      <div class="card">
          <div class="card-header">
              <h2 class="card-title">Add Ordered Product Here...</h2>
          </div>
          <div class="card-body">
              <form id="validateForm" @submit.prevent="store">
                  <div class="alert alert-danger" v-if="errors.length">
                      <a href="#" data-dismiss="alert" class="close">&times;</a>
                      <ul>
                          <li v-for="(error,index) in errors" :key="index">
                              {{ error }}
                          </li>
                      </ul>
                  </div>
                  <div class="form-group">
                      <label for="">Order Number</label>
                      <select name="order_id" id="order_id" v-model="order.order_id" class="form-control">
                          <option value="" selected disabled>Select</option>
                          <option  v-for="ord in orders" :key="ord.id" :value="ord.id" >{{ ord.order_number }}</option>
                         
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Product</label>
                      <select name="product_id" id="product_id"  v-model="order.product_id" class="form-control">
                          <option value="" selected disabled>Select</option>
                          <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <button class="btn btn-primary">Add</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</template>

<script>
export default {
 name: 'AddOrderDetail',
 created(){
   this.loadOrder();
   this.loadProducts();
  },
  methods: {
    //   fetch suppliers
      loadOrder(){
          let url = this.url + '/api/fetch_orders';
          this.axios.get(url).then(response =>{
              this.orders = response.data
              console.log(this.orders);
          });
      },
    //   fetch products
       loadProducts(){
          let url = this.url + '/api/fetch_products';
          this.axios.get(url).then(response =>{
              this.products = response.data
              console.log(this.products);
          });
      },
//   store supplied products
      store(){
          this.errors = [];
          if(!this.order.order_id){
              this.errors.push('Order is required');
          }
          if(!this.order.product_id){
              this.errors.push('Product is required');
          }
         

          if(!this.errors.length){
              let formData = new FormData();
              formData.append('order_id', this.order.order_id);
              formData.append('product_id', this.order.product_id);
             

              let url = this.url + '/api/save_order_detail';
              this.axios.post(url, formData).then((response) => {
                  if(response.status){
                      document.getElementById("order_id").value='';
                       document.getElementById("product_id").value='';
                      this.$utils.showSuccess('success', response.message);
                  }else{
                      this.$utils.showError('Error', response.message);
                  }
              }).catch(error=>{
                  this.errors.push(error.response.data.message);
              });
          }
      },
      
      },
  mounted(){
          console.log('Add Order Detail Component Mounted!');
      },
  data(){
          return {
              url: document.head.querySelector('meta[name="url"]').content,
              orders: [],
              products: [],
              order: {},
              order_id: '',
              product_id: '',
              errors: []
          }
      }
}
</script>

<style>

</style>