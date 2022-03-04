<template>
   <div>
   <div class="">
   <router-link to="/products" class="btn btn-primary"> All Products</router-link>
   </div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Products</h1>
                  </div>
                  <form class="user" @submit.prevent="productStore" enctype="multipart/form-data">
                  <div class="form-row">

                   <div class="col-md-6">
                   <div class="form-group">
                   <label> Product Name</label>
                      <input type="text" class="form-control" v-model="form.name" id="exampleInputLastName" placeholder="Enter Full Name">
                      <div class="errors" v-if="errors.name">
                        <small class="text-danger" :key="error" v-for="error in errors.name"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                          <label>Product Code</label>
                      <input type="text" class="form-control" v-model="form.code" id="exampleInputLastName" placeholder="Enter Your Email">
                      <div class="errors" v-if="errors.code">
                        <small class="text-danger" :key="error" v-for="error in errors.code"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                   <div class="form-group">
                   <label for="">Select Category</label>
                      <select v-model="form.category_id" id="" class="form-control">
                          <option v-for="category in categories" :key="category.id" :value="category.id"> {{ category.name }} </option>
                      </select>
                      <div class="errors" v-if="errors.category_id">
                        <small class="text-danger" :key="error" v-for="error in errors.category_id"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                  <div class="col-md-6">
                   <div class="form-group">
                     <label for="">Select Supplier</label>
                      <select v-model="form.supplier_id" id="" class="form-control">
                          <option :value="supplier.id" v-for="supplier in suppliers" :key="supplier.id"> {{ supplier.name }} </option>
                      </select>
                      <div class="errors" v-if="errors.supplier_id">
                        <small class="text-danger" :key="error" v-for="error in errors.supplier_id"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

               


                   <div class="col-md-4">
                   <div class="form-group">
                        <label>Seller Price</label>
                      <input type="text" class="form-control" v-model="form.seller_price" >
                      <div class="errors" v-if="errors.seller_price">
                        <small class="text-danger" :key="error" v-for="error in errors.root"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                    <div class="col-md-4">
                   <div class="form-group">
                   <label>Buying Price</label>
                      <input type="text" class="form-control" v-model="form.buy_price">
                      <div class="errors" v-if="errors.buy_price">
                        <small class="text-danger" :key="error" v-for="error in errors.buy_price"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   
                    <div class="col-md-4">
                   <div class="form-group">
                       <label>Product Root</label>
                      <input type="text" class="form-control" v-model="form.root">
                      <div class="errors" v-if="errors.root">
                        <small class="text-danger" :key="error" v-for="error in errors.root"> {{ error }} </small>
                      </div>
                    </div>
                   </div>


                   <div class="col-md-6">
                   <div class="form-group">
                      <label>Buy Date</label>                   
                      <input type="date" class="form-control" v-model="form.buy_date" id="exampleInputLastName" placeholder="Enter Your Nid">
                      <div class="errors" v-if="errors.buy_date">
                        <small class="text-danger" :key="error" v-for="error in errors.buy_date"> {{ error }} </small>
                      </div>
                    </div>
                   </div>

                   

                   <div class="col-md-6">
                   <div class="form-group">
                   <label> Product Quantity</label>
                      <input type="text" class="form-control" v-model="form.quantity" id="exampleInputLastName" placeholder="Enter Your Phone Number">
                      <div class="errors" v-if="errors.quantity">
                        <small class="text-danger" :key="error" v-for="error in errors.quantity"> {{ error }} </small>
                      </div>
                    </div>
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

  created() {
   axios.get('/api/categories')
   .then(({data}) => (this.categories = data))

   axios.get('/api/suppliers')
   .then(({data}) => (this.suppliers = data ))
  },
    data() {
      return {
        form: {
          name: '',
          supplier_id: '',
          category_id: '',
          buy_date: '',
          quantity: '',
          buy_price: '',
          seller_price: '',
          code: '',
          root: '',
          image: ''
         
        },
        errors: {},
        categories: [],
        suppliers: {}
      }
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
        productStore() {

            axios.post('/api/products', this.form)
            .then(() => {
               this.$router.push({ name: 'products'})
               Notification.success()
            })
            .catch(({response}) => {
              this.errors  = response.data.errors
            }) 
         
        },
        
    },
    

}
</script>