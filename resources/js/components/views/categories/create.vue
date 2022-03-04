<template>
   <div>
   <div class="">
   <router-link to="/categories" class="btn btn-primary"> All Cateogry</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                  </div>
                  <form class="user" @submit.prevent="categoryStore" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-12">
                   <div class="form-group">
                      <input type="text" class="form-control" v-model="form.name" id="exampleInputLastName" placeholder="Enter Full Name">
                      <div class="errors" v-if="errors.name">
                        <small class="text-danger" :key="error" v-for="error in errors.name"> {{ error }} </small>
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
          name: '',
        },
        errors: {}
      }
    },
    methods: {
        categoryStore() {

            axios.post('/api/categories', this.form)
            .then(() => {
               this.$router.push({ name: 'categories'})
               Notification.success()
            })
            .catch(({response}) => {
              this.errors  = response.data.errors
            }) 
         
        },

        
    },
    

}
</script>