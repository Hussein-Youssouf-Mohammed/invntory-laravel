<template>
   <div>
   <div class="">
   <router-link to="/expenses" class="btn btn-primary"> All Expenses</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Expense</h1>
                  </div>
                  <form class="user" @submit.prevent="expenseStore" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-12">
                   <div class="form-group">
                   <label>Expense Details</label>
                   <textarea v-model="form.details" id=""  rows="10" class="form-control"></textarea>
                      <div class="errors" v-if="errors.details">
                        <small class="text-danger" :key="error" v-for="error in errors.details"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

              <div class="col-md-12">
                   <div class="form-group">
                    <label>Expense Amount</label>
                      <input type="text" class="form-control" v-model="form.amount" id="exampleInputLastName">
                      <div class="errors" v-if="errors.amount">
                        <small class="text-danger" :key="error" v-for="error in errors.amount"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                  </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block"> <i class="fa fa-edit"></i> Add Expense </button>
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
          details: '',
          expense_date: '',
          amount: '',
        },
        errors: {}
      }
    },
    methods: {
        expenseStore() {

            axios.post('/api/expenses', this.form)
            .then(() => {
               this.$router.push({ name: 'expenses'})
               Notification.success()
            })
            .catch(({response}) => {
              this.errors  = response.data.errors
            }) 
         
        },

        
    },
    

}
</script>