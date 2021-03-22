<template>
  <div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Add Supplied Product</h2>
      <div class="card">
          <div class="card-header">
              <h2 class="card-title">Add Supplied Product Here...</h2>
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
                      <label for="">Supplier</label>
                      <select name="supplier_id" id="supplier_id" v-model="supply.supplier_id" class="form-control">
                          <option value="" selected disabled>Select</option>
                          <option  v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id" >{{ supplier.name }}</option>
                         
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Product</label>
                      <select name="product_id" id="product_id"  v-model="supply.product_id" class="form-control">
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
 name: 'AddSuppliedProduct',
 created(){
   this.loadSupplier();
   this.loadProducts();
  },
  methods: {
    //   fetch suppliers
      loadSupplier(){
          let url = this.url + '/api/fetch_suppliers';
          this.axios.get(url).then(response =>{
              this.suppliers = response.data
              console.log(this.suppliers);
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
          if(!this.supply.supplier_id){
              this.errors.push('Supplier is required');
          }
          if(!this.supply.product_id){
              this.errors.push('Product is required');
          }
         

          if(!this.errors.length){
              let formData = new FormData();
              formData.append('supplier_id', this.supply.supplier_id);
              formData.append('product_id', this.supply.product_id);
             

              let url = this.url + '/api/save_supply';
              this.axios.post(url, formData).then((response) => {
                  if(response.status){
                      document.getElementById("supplier_id").value='';
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
          console.log('AddSuppliedProduct List Component Mounted!');
      },
  data(){
          return {
              url: document.head.querySelector('meta[name="url"]').content,
              suppliers: [],
              products: [],
              supply: {},
              name: '',
              errors: []
          }
      }
}
</script>

<style>

</style>