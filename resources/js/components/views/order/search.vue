<template>
   <div>
   <div class="">
   <router-link to="/orders" class="btn btn-primary"> Today Order</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Search Order</h1>
                  </div>
                  <form class="user" @submit.prevent="search" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-12">
                   <div class="form-group">
                    <label for="date">Search By  Date</label>
                      <input type="date" class="form-control" v-model="date" id="exampleInputLastName">
                     
                    </div>
                   </div>


                  </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block"> <i class="fa fa-edit"></i> Search By  Date </button>
                    </div>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                  </div>
                  <div class="text-center">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                        <th>Vat</th>
                        <th>Due</th>
                        <th>pay</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in orders" :key="order.id">
                        <td>{{ order.name  }}</td>
                        <td>{{ order.qty  }}</td>
                        <td>{{ order.sub_total  }}</td>
                        <td>{{ order.vat  }}</td>
                        <td>{{ order.due  }}</td>
                        <td>{{ order.pay  }}</td>
                        
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
   </div>




      </div>
    </div>

   </div>
</template>

<script>

export default {
    data() {
      return {
        date: '',
        orders: [],
        errors: {} 
      }
    },
    methods: {
      search() {
          var data = {date: this.date}
          axios.post('/api/order/search', data)
          .then(({data}) => (this.orders = data))
          .catch(error => this.errors = error.response.data.errors)
      }
        
    },
    

}
</script>