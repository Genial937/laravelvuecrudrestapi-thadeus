<template>
  <div class="container">
       <h2 class="text-center p-2 text-white bg-primary mt-5">Order deatils</h2>
       <div class="card">
           <div class="card-header">
               <h2 class="card-title">Order Detail</h2>
           </div>
           <div class="card-body">
               <table class="table table-sm table-bordered">
                     <tbody>
                         <tr>
                             <th>Order Number</th>
                             <td>{{ detail.order_number }}</td>
                         </tr>
                         <tr>
                             <th>Product Name</th>
                             <td>{{ detail.name }}</td>
                         </tr>
                         <tr>
                             <th>Product Quantity</th>
                             <td>{{ detail.quantity }}</td>
                         </tr>
                         <tr>
                             <th>Product Description</th>
                             <td>{{ detail.description }}</td>
                         </tr>
                     </tbody>
                     <tfoot>
                         <tr>
                             <td colspan="2" class="td">
                                 <router-link to="/ordered_products" class="text-center p-2 text-white bg-warning mt-5 w-full">Back</router-link>
                             </td>
                         </tr>
                     </tfoot>
               </table>
           </div>
       </div>
  </div>
</template>

<script>
export default {
 name: 'OrderDetail',
  data() {
      return{
          url: document.head.querySelector('meta[name="url"]').content,
          detail: {},
          errors: []
      }
  },
  methods: {
       loadData(){
          let url = this.url + `/api/get_order_detail/${this.$route.params.id}`;
          this.axios.get(url).then((response)=>{
              this.detail = response.data;
              console.log(this.detail);
          });
      },
  },
  created(){
      this.loadData();
  },
  
  mounted: function(){
   console.log('View details ccomponent loaded!');
  }
}
</script>

<style scoped>
  .td{
      padding: 10px;
      text-align: center;
  }
  .td a{
      width: 80%;
      margin:0 auto;
  }
</style>