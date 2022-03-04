<template>
   <div>
   <div class="">
   <router-link to="/salaries" class="btn btn-primary"> All Salaries</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update Salary </h1>
                  </div>
                  <form class="user" @submit.prevent="updateSalar" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-6">
                   <div class="form-group">
                   <label >Name</label>
                      <input type="text" class="form-control" v-model="form.name" id="exampleInputLastName" >
                      <div class="errors" v-if="errors.name">
                        <small class="text-danger" :key="error" v-for="error in errors.name"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                <label >Email</label>
                      <input type="text" class="form-control" v-model="form.email" id="exampleInputLastName">
                      <div class="errors" v-if="errors.email">
                        <small class="text-danger" :key="error" v-for="error in errors.email"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                    <input type="hidden" v-model="employee_id">
                   <div class="col-md-6">
                   <div class="form-group">
                
                <label >Month</label>
                <select v-model="form.salar_month" class="form-control">
                    
                     <option value="Janury">Janury</option>
                     <option value="Feb">Feb</option>
                     <option value="Mar">Mar</option>
                     <option value="April">April</option>
                     <option value="May">May</option>
                     <option value="Jun">Jun</option>
                     <option value="July">July</option>
                     <option value="August">August</option>
                     <option value="September">September</option>
                     <option value="Oct">Oct</option>
                     <option value="Nav">Nav</option>
                     <option value="Decmber">Decmber</option>
                </select>
                      <div class="errors" v-if="errors.salar_month">
                        <small class="text-danger" :key="error" v-for="error in errors.salar_month"> {{ error }} </small>
                      </div>
                    </div>
                   </div>


                   <div class="col-md-6">
                   <div class="form-group">
                   <label>Amount</label>
                      <input type="text" class="form-control" v-model="form.amount" id="exampleInputLastName" placeholder="Enter Your Sallery">
                      <div class="errors" v-if="errors.amount">
                    <small class="text-danger" :key="error" v-for="error in errors.amount"> {{ error }} </small>
                      </div>
                    </div>
                   </div>


                  </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block"> <i class="fa fa-edit"></i> Add Employee </button>
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
      </div>
    </div>

   </div>
</template>

<script>

export default {
    data() {
      return {
        form: {
          amount: '',
          salar_month: '',
          name: '',
          email: '',
          employee_id: ''
        },
        errors: {}
      }
    },
    created() {
       let id = this.$route.params.id
       axios.get('/api/edit/salar/' + id)
       .then(({data}) => (this.form = data))
       .catch(console.log(error))
    },
    methods: {
        
        
        updateSalar() {
           let id = this.$route.params.id
            axios.post('/api/update/salar/' + id, this.form)
            .then(() => {
               this.$router.push({ name: 'salaries'})
               Notification.success()
            })
            .catch(({response}) => {
              this.errors  = response.data.errors
            }) 
         
        },

        
    },
    

}
</script>