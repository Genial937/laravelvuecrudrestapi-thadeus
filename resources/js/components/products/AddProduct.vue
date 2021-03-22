<template>
<div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Add Product</h2>
     <div class="card">
         <div class="card-header">
             <h2 class="card-title">Add Product Here...</h2>
         </div>
         <div class="card-body">
             <form id="validateForm" @submit.prevent="store" >
                   <div class="alert alert-danger" v-if="errors.length">
                      <a href="#" data-dismiss="alert" class="close">&times;</a>
                      <ul>
                          <li v-for="(error,index) in errors" :key="index">
                              {{ error }}
                          </li>
                      </ul>
                  </div>
                 <div class="form-group">
                     <label for="">Product Name</label>
                     <input type="text" id="name" v-model="product.name" class="form-control">
                 </div>
                  <div class="form-group">
                     <label for="">Product Quantity</label>
                     <input type="number" id="quantity" v-model="product.quantity" class="form-control">
                 </div>
                  <div class="form-group">
                     <label for="">Product Description</label>
                     <textarea name="" id="description" cols="30" rows="4" v-model="product.description" class="form-control"></textarea>
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
  name: 'AddProduct',
  data() {
      return{
          url: document.head.querySelector('meta[name="url"]').content,
          product: {},
          name: '',
          quantity: '',
          description: '',
          errors: []
      }
  },
  methods:{
      store(){
          this.errors = [];
          if(!this.product.name){
              this.errors.push('Name is required');
          }
          if(!this.product.quantity){
              this.errors.push('Quantity is required');
          }
          if(!this.product.description){
              this.errors.push('Description is required');
          }
         

          if(!this.errors.length){
              let formData = new FormData();
              formData.append('name', this.product.name);
              formData.append('quantity', this.product.quantity);
              formData.append('description', this.product.description);
             

              let url = this.url + '/api/save_product';
              this.axios.post(url, formData).then((response) => {
                  console.log(response);
                  if(response.status){
                      document.getElementById("name").value='';
                      document.getElementById("quantity").value='';
                      document.getElementById("description").value='';
                      
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
  mounted: function(){
   console.log('add products loaded!');
  }
}
</script>

<style>

</style>