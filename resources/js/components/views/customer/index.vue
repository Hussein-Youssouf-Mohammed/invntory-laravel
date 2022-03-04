<template>
   <div>
   <div class="my-4">
   <router-link to="/store-customer" class="btn btn-primary"> Add Customer</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="customer in filtersearch" :key="customer.id">
                        <td>{{customer.name}}</td>
                        <td> {{ customer.email }} </td>
                        <td> {{ customer.phone }} </td>
                        <td> {{ customer.address }} </td>
                        <td> <img :src="customer.image" height="40" alt=""> </td>
                        <td>
                        <router-link :to="{ name: 'edit-customer', params:{id:customer.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                        <a @click="deleteCustomer(customer.id)" class="btn btn-sm btn-danger" style="color: white">Delete</a>
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

    this.allCustomers()
         
    },


  data() {
    return {
      customers: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.customers.filter(customer => {
       return customer.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    allCustomers() {
    axios.get('/api/customers')
    .then(({data}) => (this.customers = data))
    .catch()
  },

  deleteCustomer(id) {
                    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
          
            if (result.isConfirmed) {
                axios.delete('/api/customers/' + id) 
            .then(() => {
               this.employees = this.customers.filter( customer => {
                 return customer.id != id
               })
            })
            .catch(() => {
               this.$router.push({ name: 'customers'})
            })
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        }
  },
 

}
</script>