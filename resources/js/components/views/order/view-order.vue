<template>
   <div>
   <div class="">
   <router-link to="/products" class="btn btn-primary"> All Products</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Products</h1>
                  </div>
                    <div>
                       <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ordder Tetails</h6>
                </div>
                <div class="table-responsive">
                 <ul class="list-group">
                   <li class="list-group-item"><b>Name :</b> {{ orders.name }} </li>
                   <li class="list-group-item"><b>Address :</b> {{ orders.address }} </li>
                   <li class="list-group-item"><b>Phone :</b> {{orders.phone }} </li>
                   <li class="list-group-item"><b>Date :</b> {{ orders.order_date }} </li>
                   <li class="list-group-item"><b>Pay Through :</b> {{ orders.payby}} </li>
                 </ul>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Products</h1>
                  </div>
                    <div>
                       <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                </div>
                <div class="table-responsive">
                  <ul class="list-group">
                   <li class="list-group-item"><b>Sub Total :</b> {{ orders.sub_total }} $</li>
                   <li class="list-group-item"><b>Due :</b> {{ orders.vat }} $</li>
                   <li class="list-group-item"><b>Pay Amount :</b> {{orders.pay }} $</li>
                 </ul>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>

          
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- new row -->

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
                        <th>Product Code</th>
                        <th>Qty</th>
                        <th>Image</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="detail in details" :key="detail.id">
                        <td>{{ detail.name  }}</td>
                        <td>{{ detail.code  }}</td>
                        <td>{{ detail.qty  }}</td>
                        <td> <img :src="detail.image" alt=""></td>
                        <td>{{ detail.price  }}</td>
                        <td>{{ detail.sub_total  }}</td>
                        
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
   </div>


   </div>
</template>

<script>

export default {

  created() {

    let id = this.$route.params.id

    axios.get(`/api/order/details/${id}`)
    .then(({data}) => (this.orders = data))
    .catch(console.log('error'))

    axios.get('/api/order/orderdetails/' + id)
   .then(({data}) => (this.details = data ))
   .catch(console.log('error'))
  },
    data() {
      return {
        errors: {},
        orders: {},
        details: {}
      }
    },
    methods: {
        
        
    },
    

}
</script>