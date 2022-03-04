<template>
   <div>
         <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form class="user" @submit.prevent="signup">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" v-model="form.name" id="exampleInputLastName" placeholder="Enter Last Name">
                      <div class="errors" v-if="errors.name">
                        <small class="text-danger" :key="error" v-for="error in errors.name"> {{ error }} </small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" v-model="form.email">
                        <div class="errors" v-if="errors.email">
                        <small class="text-danger" :key="error" v-for="error in errors.email"> {{ error }} </small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" v-model="form.password" id="exampleInputPassword" placeholder="Password">
                      <div class="errors" v-if="errors.password">
                        <small class="text-danger" :key="error" v-for="error in errors.password"> {{ error }} </small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Repeat Password</label>
                      <input type="password" v-model="form.password_confirmation" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Repeat Password">
                        <div class="errors" v-if="errors.password">
                        <small class="text-danger" :key="error" v-for="error in errors.password_confirmation"> {{ error }} </small>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Register</button>
                    </div>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <router-link class="font-weight-bold small" to="/login">Already have an account?</router-link>
                  </div>
                  <div class="text-center">
             <router-link class="font-weight-bold small" to="/forget">Forget Password</router-link>

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
          password: '',
          password_confirm: ''
        },
        errors: {}
      }
    },
    methods: {
      signup() {
        axios.post('http://localhost:8000/api/auth/signup', this.form) 
        .then( res => {
           User.responseAfterLogin(res)
           Toast.fire({
             icon: 'success',
             title: 'Signup successfully.'
           })
           this.$router.push({ name: '/'})
        })
          .catch(({response}) => {
          this.loading = false;
          if(response.status === 401) {
                Toast.fire({
            icon: 'warning',
            title: 'Invalid Email Or Password'
          })
          } else {

            this.errors = response.data.errors
          }
          
          
          })
        
      }
    },
}
</script>