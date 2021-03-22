<template>
<div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Add Supplier</h2>
     <div class="card">
         <div class="card-header">
             <h2 class="card-title">Add Supplier Here...</h2>
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
                     <label for="">Supplier Name</label>
                     <input type="text" id="name" v-model="supplier.name" class="form-control" placeholder="Enter supplier name...">
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
  name: 'AddSupplier',
  data() {
      return{
          url: document.head.querySelector('meta[name="url"]').content,
          supplier: {},
          name: '',
          errors: []
      }
  },
  methods:{
      store(){
          this.errors = [];
          if(!this.supplier.name){
              this.errors.push('Name is required');
          }
         

          if(!this.errors.length){
              let formData = new FormData();
              formData.append('name', this.supplier.name);
             

              let url = this.url + '/api/save_supplier';
              this.axios.post(url, formData).then((response) => {
                  if(response.status){
                      document.getElementById("name").value='';
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
   console.log('add supplier loaded!');
  }
}
</script>

<style>

</style>