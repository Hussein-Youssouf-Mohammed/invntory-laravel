<template>
   <div>
   <div class="my-4">
   <router-link to="/store-category" class="btn btn-primary"> Add Category</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="category in filtersearch" :key="category.id">
                        <td>{{category.name}}</td>
                       
                        <td>
                        <router-link :to="{ name: 'edit-category', params:{id:category.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                        <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger" style="color: white">Delete</a>
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

    this.allCategories()
         
    },


  data() {
    return {
      categories: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.categories.filter(employee => {
       return employee.name.match(this.searchEmp)
     })
   }
   },
  methods: {
    allCategories() {
    axios.get('/api/categories')
    .then(({data}) => (this.categories = data))
    .catch()
  },

  deleteCategory(id) {
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
                axios.delete('/api/categories/' + id) 
            .then(() => {
               this.categories = this.categories.filter( category => {
                 return category.id != id
               })
            })
            .catch(() => {
               this.$router.push({ name: 'categories'})
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