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
                  <h6 class="m-0 font-weight-bold text-primary">All Salary Details</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Month</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="salar in filtersearch" :key="salar.id">
                        <td>{{salar.salar_month}}</td>
         
                        <td>
                        <router-link :to="{ name: 'view-salar', params:{id:salar.salar_month}}" class="btn btn-sm btn-primary">View Salary</router-link>
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

    this.allSalary()
         
    },


  data() {
    return {
      salaries: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.salaries.filter(salary => {
       return salary.salar_month.match(this.searchEmp)
     })
   }
   },
  methods: {
    allSalary() {
    axios.get('/api/salaries')
    .then(({data}) => (this.salaries = data))
    .catch()
  },

  
  },
 

}
</script>