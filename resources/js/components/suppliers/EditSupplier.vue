<template>
<div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Edit Supplier</h2>
      <div class="card">
         <div class="card-header">
             <h2 class="card-title">Edit Supplier Here...</h2>
         </div>
         <div class="card-body">
             <form id="validateForm" @submit.prevent="update">
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
                     <input type="text" id="name" v-model="supplier.name" class="form-control">
                     <input type="hidden" id="id" name="id" v-model="supplier.id">
                 </div>
                 <div class="form-group">
                     <button class="btn btn-primary">Update</button>
                 </div>
             </form>
         </div>
     </div>
</div>
</template>

<script>
export default {
  name: 'EditSupplier',
   data() {
      return{
          url: document.head.querySelector('meta[name="url"]').content,
          supplier: {},
          name: '',
          errors: []
      }
  },
  methods:{
      loadData(){
          let url = this.url + `/api/get_supplier/${this.$route.params.id}`;
          this.axios.get(url).then((response)=>{
              this.supplier = response.data;
              console.log(this.supplier);
          });
      },
      update(){
     this.errors = [];
          if(!this.supplier.name){
              this.errors.push('Name is required');
          }
         

          if(!this.errors.length){
              let formData = new FormData();
              formData.append('name', this.supplier.name);
             

              let url = this.url + `/api/update_supplier/${this.supplier.id}`;
              this.axios.post(url, formData).then((response) => {
                  if(response.status){
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
  created(){
      this.loadData();
  },
  
  mounted: function(){
   console.log('Edit supplier loaded!');
  }
}
</script>

<style>

</style>