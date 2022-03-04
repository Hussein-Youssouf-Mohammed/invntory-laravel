<template>
   <div>
   <div class="my-4">
   <router-link to="/store-employee" class="btn btn-primary"> Add Employy</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Sallery</th>
                        <th>Join_date</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="employee in filtersearch" :key="employee.id">
                        <td>{{employee.name}}</td>
                        <td> {{ employee.email }} </td>
                        <td> {{ employee.phone }} </td>
                        <td> {{ employee.sallery }} </td>
                        <td> {{ employee.join_date }} </td>
                        <td> <img :src="employee.image" height="40" alt=""> </td>
                        <td>
                        <router-link :to="{ name: 'edit-employee', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                        <a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger" style="color: white">Delete</a>
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
      employees: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.employees.filter(employee => {
       return employee.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    allEmployees() {
    axios.get('/api/employees')
    .then(({data}) => (this.employees = data))
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
                axios.delete('/api/employees/' + id) 
            .then(() => {
               this.employees = this.employees.filter( employee => {
                 return employee.id != id
               })
            })
            .catch(() => {
               this.$router.push({ name: 'employees'})
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