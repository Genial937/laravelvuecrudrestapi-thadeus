<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
         aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
             <li class="nav-item">
             <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
             </li>
             
              <li class="nav-item">
             <router-link class="nav-link" to="/suppliers">Suppliers</router-link>
             </li>
              <li class="nav-item">
             <router-link class="nav-link" to="/products">Products</router-link>
             </li>
              <li class="nav-item">
             <router-link class="nav-link" to="/orders">Orders</router-link>
             </li>
             <li class="nav-item">
             <router-link class="nav-link" to="/supplied_products">Supplied Products</router-link>
             </li>
             <li class="nav-item">
             <router-link class="nav-link" to="/ordered_products">Ordered Products</router-link>
             </li>
         </ul>
         </div>
     </div>
  </nav>
</template>

<script>
export default {
 name: 'Navbar',
}
</script>

<style scoped>

</style>