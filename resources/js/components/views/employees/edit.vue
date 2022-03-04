<template>
   <div>
   <div class="">
   <router-link to="/employees" class="btn btn-primary"> All Employy</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Employee Update </h1>
                  </div>
                  <form class="user" @submit.prevent="employeeUpdate" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-6">
                   <div class="form-group">
                      <input type="text" class="form-control" v-model="form.name" id="exampleInputLastName" placeholder="Enter Full Name">
                      <div class="errors" v-if="errors.name">
                        <small class="text-danger" :key="error" v-for="error in errors.name"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                
                      <input type="text" class="form-control" v-model="form.email" id="exampleInputLastName" placeholder="Enter Your Email">
                      <div class="errors" v-if="errors.email">
                        <small class="text-danger" :key="error" v-for="error in errors.email"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                
                      <input type="text" class="form-control" v-model="form.address" id="exampleInputLastName" placeholder="Enter Your Address">
                      <div class="errors" v-if="errors.address">
                        <small class="text-danger" :key="error" v-for="error in errors.address"> {{ error }} </small>
                      </div>
                    </div>
                   </div>


                   <div class="col-md-6">
                   <div class="form-group">
                
                      <input type="text" class="form-control" v-model="form.sallery" id="exampleInputLastName" placeholder="Enter Your Sallery">
                      <div class="errors" v-if="errors.sallery">
                        <small class="text-danger" :key="error" v-for="error in errors.sallery"> {{ error }} </small>
                      </div>
                    </div>
                   </div>


                   <div class="col-md-6">
                   <div class="form-group">
                
                      <input type="date" class="form-control" v-model="form.join_date" id="exampleInputLastName" placeholder="Enter Your Email">
                      <div class="errors" v-if="errors.join_date">
                        <small class="text-danger" :key="error" v-for="error in errors.join_date"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                
                      <input type="text" class="form-control" v-model="form.nid" id="exampleInputLastName" placeholder="Enter Your Nid">
                      <div class="errors" v-if="errors.nid">
                        <small class="text-danger" :key="error" v-for="error in errors.nid"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   

                   <div class="col-md-6">
                   <div class="form-group">
                
                      <input type="text" class="form-control" v-model="form.phone" id="exampleInputLastName" placeholder="Enter Your Phone Number">
                      <div class="errors" v-if="errors.phone">
                        <small class="text-danger" :key="error" v-for="error in errors.phone"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                   <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" @change="imageUpload">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                   </div>


                   <div class="col-md-6">
                   <div class="form-group">
                     <img :src="form.image" alt="" height="40" width="40"> 
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
          email: '',
          phone: '',
          join_date: '',
          address: '',
          image: '',
          sallery: '',
          nid: '',
        },
        errors: {}
      }
    },
    created() {
       let id = this.$route.params.id
       axios.get('/api/employees/' + id)
       .then(({data}) => (this.form = data))
       .catch(console.log(error))
    },
    methods: {
        
        imageUpload(event) {
          let file  = event.target.files[0]
          if(file.size > 190000290) {
             Notification.image_validation()
          } else  {
            let reader = new FileReader()
            reader.onload = event => {
            this.form.image = event.target.result
            console.log(event.target.result)
          }
          reader.readAsDataURL(file);
          }
        },
        employeeUpdate() {
           let id = this.$route.params.id
            axios.patch('/api/employees/' + id, this.form)
            .then(() => {
               this.$router.push({ name: 'employees'})
               Notification.success()
            })
            .catch(({response}) => {
              this.errors  = response.data.errors
            }) 
         
        },

        
    },
    

}
</script>