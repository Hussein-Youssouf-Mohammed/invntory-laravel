<template>
   <div>
   <div class="my-4">
   <router-link to="/store-supplier" class="btn btn-primary"> Add Supplier</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Supplier List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>address</th>
                        <th>Shop Name</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="supplier in filtersearch" :key="supplier.id">
                        <td>{{supplier.name}}</td>
                        <td> {{ supplier.email }} </td>
                        <td> {{ supplier.phone }} </td>
                        <td> {{ supplier.address }} </td>
                        <td> {{ supplier.shop_name }} </td>
                        <td> <img :src="supplier.image" height="40" alt=""> </td>
                        <td>
                        <router-link :to="{ name: 'edit-supplier', params:{id:supplier.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                        <a @click="deleteEmployee(supplier.id)" class="btn btn-sm btn-danger" style="color: white">Delete</a>
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

    this.allEmployees()
         
    },


  data() {
    return {
      suppliers: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.suppliers.filter(supplier => {
       return supplier.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    allEmployees() {
    axios.get('/api/suppliers')
    .then(({data}) => (this.suppliers = data))
    .catch()
  },

  deleteEmployee(id) {
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
                axios.delete('/api/suppliers/' + id) 
            .then(() => {
               this.suppliers = this.suppliers.filter( employee => {
                 return employee.id != id
               })
            })
            .catch(() => {
               this.$router.push({ name: 'suppliers'})
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