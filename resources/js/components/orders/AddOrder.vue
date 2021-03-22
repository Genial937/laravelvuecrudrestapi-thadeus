<template>
  <div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Add Order</h2>
      <div class="card">
          <div class="card-header">
              <h2>Add order here...</h2>
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
                       <input type="text" id="order_no" v-model="order.order_no" class="form-control">
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
name: 'AddOrder',
data() {
      return{
          url: document.head.querySelector('meta[name="url"]').content,
          order: {},
          order_no: '',
          errors: []
      }
  },
  methods:{
      store(){
          this.errors = [];
          if(!this.order.order_no){
              this.errors.push('Order number is required');
          }
         

          if(!this.errors.length){
              let formData = new FormData();
              formData.append('order_no', this.order.order_no);
             

              let url = this.url + '/api/save_order';
              this.axios.post(url, formData).then((response) => {
                  if(response.status){
                      document.getElementById("order_no").value='';
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
   console.log('add order loaded!');
  }
}
</script>

<style>

</style>