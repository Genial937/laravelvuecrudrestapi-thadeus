<template>
   <div class="container">
         <h2 class="text-center p-2 text-white bg-primary mt-5">View Supply</h2>
         <div class="card">
             <div class="card-body">
                 <table class="table table-sm table-bordered">
                     <tbody>
                         <tr>
                             <th>Supplier</th>
                             <td>{{ supply.name }}</td>
                         </tr>
                         <tr>
                             <th>Product</th>
                             <td>{{ supply.product }}</td>
                         </tr>
                         <tr>
                             <th>Quantity</th>
                             <td>{{ supply.quantity }}</td>
                         </tr>
                         <tr>
                             <th>Description</th>
                             <td>{{ supply.description }}</td>
                         </tr>
                     </tbody>
                     <tfoot>
                         <tr>
                             <td colspan="2">
                                 <router-link to="/supplied_products" class="btn btn-sm btn-warning text-center">Back</router-link>
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
name: 'ViewSupply',
data() {
      return{
          url: document.head.querySelector('meta[name="url"]').content,
          supply: {},
          errors: []
      }
  },
  methods: {
       loadData(){
          let url = this.url + `/api/get_supply/${this.$route.params.id}`;
          this.axios.get(url).then((response)=>{
              this.supply = response.data;
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

<style>

</style>