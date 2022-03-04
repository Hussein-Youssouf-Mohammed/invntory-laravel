<template>
    <div class="my-5">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" @submit.prevent="login">
                    <div class="form-group">
                      <input type="email" class="form-control" v-model="form.email" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                        <div class="errors" v-if="errors.email">
                         <small class="text-danger" v-for="error in errors.email" :key="error"> {{ error }} </small>
                        </div>
                    </div>
                    <div class="form-group">
                      <input type="password" v-bind:class="{'is-invalid': errors.password}" class="form-control" v-model="form.password" id="exampleInputPassword" placeholder="Password">
                      <div class="errors" v-if="errors.password">
                        <small class="text-danger" :key="error" v-for="error in errors.password"> {{ error }} </small>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" :disabled="loading" class="btn btn-primary btn-block">
                        <i class="fas fs-spin fa-spinner" v-if="loading"></i>
                        {{ loading ? '' : 'Login' }}
                      </button>
                    </div>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <router-link class="font-weight-bold small" to="/register">Create an Account!</router-link>
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
  created() {
   if(User.loggedIn()) {
     this.$router.push({name: '/'})
   }
  },
    data() {
      return {
        form: {
          password: '',
          email: ''
        },
        errors: {},
        loading: false
      }
    },
    methods: {
      login() {
        this.loading = true
        axios.post('http://localhost:8000/api/auth/login', this.form) 
        .then(res => {
            User.responseAfterLogin(res)

            Toast.fire({
              icon: 'success',
              title: 'LoggedIn successfully.'
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