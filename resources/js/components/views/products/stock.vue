<template>
   <div>
   <div class="my-4">
   <router-link to="/store-employee" class="btn btn-primary"> Add Product</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Buy price</th>
                        <th>Buy Seller</th>
                        <th>Buy Date</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in filtersearch" :key="product.id">
                        <td>{{product.name}}</td>
                        <td>{{product.buy_price}}</td>
                        <td> {{ product.seller_price }} </td>
                        <td> {{ product.buy_date }} </td>
                        <td> {{ product.category_name }} </td>
                        <td v-if="product.quantity >= 1">
                        <span class="badge badge-success">Avaiable</span>
                        </td>
                        <td v-else>
                         <span class="badge badge-danger">Out Stock</span>
                        </td>

                        <td> {{ product.quantity }} </td>
                        <td>
                        <router-link :to="{ name: 'edit-stock', params:{id:product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
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

    this.allProduct()
         
    },


  data() {
    return {
      products: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.products.filter(product => {
       return product.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    allProduct() {
    axios.get('/api/products')
    .then(({data}) => (this.products = data))
    .catch()
  },

  deleteProduct(id) {
                    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
          
            
            if (result.isConfirmed) {
                axios.delete('/api/products/' + id) 
            .then(() => {
               this.products = this.products.filter( product => {
                 return product.id != id
               })
            })
            .catch(() => {
               this.$router.push({ name: 'products'})
            })
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        }
  },
 

}
</script>