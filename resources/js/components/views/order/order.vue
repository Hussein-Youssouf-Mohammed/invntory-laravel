<template>
   <div>
   <div class="my-4">
   <router-link to="/store-expense" class="btn btn-primary"> Add Expense</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Total Amount</th>
                        <th>PayBy</th>
                        <th>Pay</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in filtersearch" :key="order.id">
                        <td>{{order.name}}</td>
                        <td>{{order.sub_total}}</td>
                        <td>{{order.payby}}</td>
                        <td>{{order.pay}}</td>
                       
                        <td>
                        <router-link :to="{ name: 'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>
                        </td>
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
        if(! User.loggedIn()) {
            this.$router.push({ name: 'login'})
        } else {
          //
        }

    this.allOrder()
         
    },


  data() {
    return {
      orders: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.orders.filter(order => {
       return order.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    allOrder() {
    axios.get('/api/get/orders')
    .then(({data}) => (this.orders = data))
    .catch()
  },

  
  },
 

}
</script>