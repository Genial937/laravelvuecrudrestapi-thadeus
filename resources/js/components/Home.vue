<template>
  <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Home Page</h2>
        <div class="card">
          <div class="card-body">
            <LineChart :chart-data="datacollection" :height="100"/>
            <!-- <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    Products
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    Suppliers
                  </div>
                </div>
              </div>
               <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    Orders
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
  </div>
</template>

<script>
import LineChart from './LineChart'
export default {
  name: 'Home',
  components: {
    LineChart
  },
  data(){
    return {
      datacollection: null
    }
  },
  mounted () {
    this.fillData()
  },
  methods: {

    fillData ()
    {
      this.datacollection = {
        labels: ['start','suppliers','products','orders'],
        datasets: [
          {
            label: 'Solutech Shop',
            backgroundColor: '#F9B918',
            data: [0, 50, 80,30]
          },
        ]
      }
    }
  }
}
</script>

<style>

</style>