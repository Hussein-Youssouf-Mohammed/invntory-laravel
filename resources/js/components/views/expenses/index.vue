<template>
   <div>
   <div class="my-4">
   <router-link to="/store-expense" class="btn btn-primary"> Add Expense</router-link>
   </div>
   <input type="text" v-model="searchEmp" style="width: 300px" placeholder="Search Here" class="form-control">
  <div class="row my-4">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Details</th>
                        <th>Expense Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="expense in filtersearch" :key="expense.id">
                        <td>{{expense.details}}</td>
                        <td>{{expense.expense_date}}</td>
                        <td>{{expense.amount}}</td>
                       
                        <td>
                        <router-link :to="{ name: 'edit-expense', params:{id:expense.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                        <a @click="deleteExpenses(expense.id)" class="btn btn-sm btn-danger" style="color: white">Delete</a>
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

    this.allExpenses()
         
    },


  data() {
    return {
      expenses: [],
      searchEmp: ''
    }
  },
   computed: {
   filtersearch() {
     return this.expenses.filter(expense => {
       return expense.details.match(this.searchEmp)
     })
   }
   },
  methods: {
    allExpenses() {
    axios.get('/api/expenses')
    .then(({data}) => (this.expenses = data))
    .catch()
  },

  deleteExpenses(id) {
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

                axios.delete('/api/expenses/' + id) 
            .then(() => {
               this.expenses = this.expenses.filter( expense => {
                 return expense.id != id
               })
            })
            .catch(() => {
               this.$router.push({ name: 'expenses'})
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