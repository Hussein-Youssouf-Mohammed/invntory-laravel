<template>
  
  <div>
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
          </div>

          <div class="row mb-3">

            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
         <a class="btn btn-sm btn-info"><font color="#ffffff">Add Customer</font></a>         
                  
                </div>

                <div class="table-responsive" style="font-size: 12px;">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="cart in carts" :key="cart.id">
                        <td> {{ cart.pro_name }} </td>
                        <td> <input type="text" readonly style="width: 15px" :value=" cart.quantity"> 
                          <button class="btn btn-sm btn-success" @click.prevent="increment(cart.id)">+</button>
                          <button class="btn btn-sm btn-danger" @click.prevent="decrement(cart.id)" v-if="cart.quantity >= 2">-</button>
                          <button class="btn btn-danger btn-sm disabled" v-else>-</button>
                        </td>
                        <td>{{ cart.price }} </td>
                        <td>{{ cart.sub_total }} </td>
                        <td><a @click="reomveCart(cart.id)" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
 
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
            <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
  <strong>{{ qty }}</strong>
   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
  <strong>{{ subtotal }} $</strong>
   </li>

     <li class="list-group-item d-flex justify-content-between align-items-center">Vat:
  <strong>35 %</strong>
   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">Total :
  <strong>5456 $</strong>
   </li> 
              
            </ul>   
            <br> 

        <form @submit.prevent="Order">
          <label>Customer Name</label>
          <select class="form-control"  v-model="customer_id">
                 <option> Select Customer </option>
                 <option :value="customer.id" v-for="customer in customers" :key="customer.id"> {{ customer.name }} </option>
           </select>

           <label>Pay</label>
           <input type="text" class="form-control" required="" v-model="pay">

           <label>Due</label>
           <input type="text" class="form-control" required="" v-model="due">

          <label>Pay By</label>
          <select class="form-control" v-model="payby">
                 <option value="HandCash">Hand Cash </option>
                 <option value="Cheaque">Cheaque </option>
                 <option value="GiftCard">Gift Card </option>
           </select>

           <br>
           <button type="submit" class="btn btn-success">Submit</button>

        </form>    

                </div>
  
              </div>
            </div>
            <!-- Pie Chart -->

            <div class="col-xl-7 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                  </div>

   <!--  Category Wise Product -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product </a>
  </li>

  <li class="nav-item" v-for="category in categories" :key="category.id">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subproduct(category.id)" >{{ category.name }}</a>
  </li>
   
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="card-body">
 <input type="text" v-model="searchTerm" class="form-control py-4" style="width: 560px;" placeholder="Search Product">

     <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-6 py-4" v-for="product in filtersearch" :key="product.id">
             <button @click.prevent="AddCart(product.id)">
             <div class="card py-4" style="width: 8.5rem; margin-bottom: 5px;">
              <img :src="product.image" id="em_photo" class="card-img-top">
              <div class="card-body">
                <h6 class="card-title">{{ product.name }}</h6>
       <span class="badge badge-success" v-if="product.quantity  >= 1 ">Available {{ product.quantity }}  </span> 
    <span class="badge badge-danger" v-else>Stock Out </span> 
                
              </div>
            </div></button>
          
        </div>        

        
      </div>

     </div>

  </div>  <!--  End TBAS HOME -->


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


<input type="text" v-model="getsearchTerm" class="form-control" style="width: 560px;" placeholder="Search Product">

     <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="getproduct in getfiltersearch" :key="getproduct.id">
             <button @click.prevent="AddCart(product.id)">
             <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
              <img :src="getproduct.image" id="em_photo" class="card-img-top">
              <div class="card-body">
                <h6 class="card-title">{{ getproduct.name }}</h6>
       <span class="badge badge-success" v-if="getproduct.quantity  >= 1 ">Available {{ getproduct.quantity }}  </span> 
    <span class="badge badge-danger" v-else>Stock Out </span> 
                
              </div>
            </div></button>
          
        </div>        
      </div>


  </div>
  
</div>
<!-- End Category Wise Product -->

                </div>
                 
              </div>
            </div>
          </div>
          <!--Row-->
  </div>
</template>

<script type="text/javascript">
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    this.allProduct();
    this.allCategory();
    this.allCustomer();
    this.allCart();
    Reload.$on('After', () => {
      this.allCart()
    })
    },
 data(){
      return{
        due: '',
        payby: '',
        customer_id: '',
        pay: '',
        products:[],
        categories:'',
        getproducts:[],
        customers:[],
        carts:[],
        searchTerm:'',
        getsearchTerm:'',
   
      }
    },
    computed:{
      filtersearch(){
      return this.products.filter(product => {
         return product.name.match(this.searchTerm)
      }) 
      },
       getfiltersearch(){
      return this.getproducts.filter(getproduct => {
         return getproduct.name.match(this.getsearchTerm)
       }) 
      },
      qty() {
        let sum = 0;
        for(let i = 0 ; i < this.carts.length; i++) {
            sum += (parseFloat(this.carts[i].quantity))
        }
        return sum
      },

      subtotal() {
        let sum = 0;
        for(let i = 0 ; i < this.carts.length; i++) {
            sum += (parseFloat(this.carts[i].quantity) * parseFloat(this.carts[i].price))
        }
        return sum
      },
    },
  methods:{
    allProduct(){
    axios.get('/api/products')
    .then(({data}) => (this.products = data))
      .catch()
    },
    allCustomer(){
    axios.get('/api/customers')
    .then(({data}) => (this.customers = data))
      .catch()
    },
     allCategory(){
      axios.get('/api/categories')
      .then(({data}) => (this.categories = data))
      .catch()
    },
     reomveCart(id) {
      axios.delete('/api/remove/cart/' + id) 
     .then(() => {
        Reload.$emit('After')
        Notification.success();
      })
     },
    allCart(){
      axios.get('/api/cart')
      .then(({data}) => (this.carts = data))
      .catch()
    },
    subproduct(id){
      axios.get('/api/getting/product/'+id)
      .then(({data}) => (this.getproducts = data))
      .catch()
    } ,
    AddCart(id) {
      axios.get('/api/addCart/' + id)
      .then(() => {
        Reload.$emit('After')
        Notification.success();
      })
      .catch()
    },
    increment(id) {
      axios.get('/api/increment/' + id)
      .then(() => {
         Reload.$emit('After')
        Notification.success();
      })
      .catch()
    },
   decrement(id) {
      axios.get('/api/decrement/' + id)
      .then(() => {
        Reload.$emit('After')
        Notification.success();
      })
      .catch()
    },

    Order() {
      let  totoal = this.subtotal ;
      var data = {due: this.due, qty: this.qty, payby: this.payby, totoal: this.totoal, subtotal: this.subtotal, customer_id: this.customer_id, pay: this.pay}
      axios.post('/api/order', data)
      .then(() => {
        Notification.success();
        this.$router.push({name: '/'})
      })
    }

    }  

  } 

</script>

<style type="text/css" scoped>
  #em_photo{
    height: 100px;
    width: 135px;
  }
  .card .table td, .card .table th {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }
</style>