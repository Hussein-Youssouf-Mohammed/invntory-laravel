<template>
   <div>
   <div class="my-4">
   <router-link to="/salaries" class="btn btn-primary"> Go Back</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee Salary Details</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="salar in filtersearch" :key="salar.id">
                        <td>{{salar.name}}</td>
                        <td> {{ salar.salar_date }} </td>
                        <td> {{ salar.amount }} </td>
                        <td> {{ salar.salar_month }} </td>
                        <td>
                        <router-link :to="{ name: 'edit-salar', params:{id:salar.id}}" class="btn btn-sm btn-primary">Edit Salary</router-link>
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

    this.viewSalary()
         
    },


  data() {
    return {
      salaries: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.salaries.filter(salar => {
       return salar.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    viewSalary() {
        let id  = this.$route.params.id 
    axios.get('/api/view/salar/' + id) 
    .then(({data}) => (this.salaries = data))
    .catch()
  },

  
  },
 

}
</script>