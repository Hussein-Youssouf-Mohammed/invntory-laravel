<template>
    <div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Today Sell</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{todaysell}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span>Since last month</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Today Icome</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{ todayicome }} </div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span>Since last years</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-cart fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Expese</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">$ {{ todayexpense }} </div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                <span>Since last month</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span>Since yesterday</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Stock</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Buy price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in products" :key="product.id">
                        <td>{{product.name}}</td>
                        <td>{{product.buy_price}}</td>
                        <td> <img :src="product.image" height="40" alt=""> </td>
                        <td v-if="product.quantity >= 1">
                        <span class="badge badge-success">Avaiable</span>
                        </td>
                        <td v-else>
                         <span class="badge badge-danger">Out Stock</span>
                        </td>

                        <td> {{ product.quantity }} </td>
                     
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
 
  </div>
  <!--Row-->


    </div>
</template>

<script>
export default {
    created() {
        if(! User.loggedIn()) {
            this.$router.push({ name: 'login'})
        }
    },
    data() {
      return {
         todaysell: '',
         todayicome: '',
         todayexpense: '',
         products: ''
      }
    },
    mounted() {
    this.sell();
    this.icom();
    this.exp();
    this.stock();
    },
    methods: {
      sell() {
        axios.get('/api/sell')
        .then(({data}) => (this.todaysell = data))
        .catch()
      },
      icom() {
        axios.get('/api/icom')
        .then(({data}) => (this.todayicome = data))
        .catch()
      },
      exp() {
        axios.get('/api/exp')
        .then(({data}) => (this.todayexpense= data))
        .catch()
      },
      stock() {
        axios.get('/api/stock')
        .then(({data}) => (this.products= data))
        .catch()
      },
    }
}
</script>