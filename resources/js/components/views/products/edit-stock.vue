<template>
   <div>
   <div class="">
   <router-link to="/stock" class="btn btn-primary"> Go Back</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update  Stock</h1>
                  </div>
                  <form class="user" @submit.prevent="stockUpdate" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-12">
                   <div class="form-group">
                   <label> Product Quantity</label>
                      <input type="text" class="form-control" v-model="form.quantity" id="exampleInputLastName" placeholder="Enter Full Name">
                      <div class="errors" v-if="errors.quantity">
                        <small class="text-danger" :key="error" v-for="error in errors.quantity"> {{ error }} </small>
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

  created() {
   axios.get('/api/categories')
   .then(({data}) => (this.categories = data));

   axios.get('/api/suppliers')
   .then(({data}) => (this.suppliers = data ));

    let id = this.$route.params.id
    axios.get('/api/products/' + id)
    .then(({data}) => (this.form = data))
    .catch(console.log(error))
  },
    data() {
      return {
        form: {
          quantity: '',
         
        },
        errors: {},
        categories: [],
        suppliers: {}
      }
    },
    methods: {
    
        stockUpdate() {
            let id = this.$route.params.id
            axios.post('/api/edit/stock/' + id, this.form)
            .then(() => {
               this.$router.push({ name: 'stock'})
               Notification.success()
            })
            .catch(({response}) => {
              this.errors  = response.data.errors
            }) 
         
        },
        
    },
    

}
</script>