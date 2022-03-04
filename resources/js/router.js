import Vue from 'vue'
import Router from 'vue-router'
// Start auth router
import Login from './components/auth/login.vue'
import Register from './components/auth/register.vue'
import Forget from './components/auth/forget.vue'
import Logout from './components/auth/logout.vue'
// end auth router 
import Home from './components/home.vue'

// Start employee router
import StoreEmployee from './components/views/employees/create.vue' 
import Employee  from './components/views/employees/index.vue'
import EditEmployee  from './components/views/employees/edit.vue'

// Start supplier router
import StoreSupplier from './components/views/suppliers/create.vue' 
import Supplier  from './components/views/suppliers/index.vue'
import EditSupplier  from './components/views/suppliers/edit.vue'

// Start categories router
import StoreCategory from './components/views/categories/create.vue' 
import Category  from './components/views/categories/index.vue'
import EditCategory  from './components/views/categories/edit.vue'


// Start categories router
import StoreProduct from './components/views/products/create.vue' 
import Products  from './components/views/products/index.vue'
import EditProduct  from './components/views/products/edit.vue'
import Stock  from './components/views/products/stock.vue'
import EditStock  from './components/views/products/edit-stock.vue'

// Start categories router
import StoreExpense from './components/views/expenses/create.vue' 
import Expenses  from './components/views/expenses/index.vue'
import EditExpense  from './components/views/expenses/edit.vue'

// Start categories router
import StoreCustomer from './components/views/customer/create.vue' 
import Customer  from './components/views/customer/index.vue'
import EditCustomer  from './components/views/customer/edit.vue'

// Salar
import salar from './components/views/salar/all-employee.vue' 
import paysalar  from './components/views/salar/create.vue'
import Salaries  from './components/views/salar/index.vue'
import ViewSalary  from './components/views/salar/view.vue'
import EditSalary  from './components/views/salar/edit.vue'


//Pos  
import Pos from './components/views/pos/pos.vue'

//Order 
import Order from './components/views/order/order.vue'
import ViewOrder from './components/views/order/view-order.vue';
import Search from './components/views/order/search.vue';


Vue.use(Router)

const router = new Router ({
    routes: [
        { path: '/login', component: Login,  name: 'login' },
        { path: '/forget', component: Forget, name: 'forget'},
        { path: '/register', name: "register",component: Register},
        { path: '/logout', name: "logout",component: Logout},
        //end auth
        { path: '/', name: "/",component: Home},
        //employee 
       {path: '/store-employee', component: StoreEmployee , name: 'store-employee'},
       {path: '/employees', component: Employee , name: 'employees'},
       {path: '/edit-employee/:id', component: EditEmployee , name: 'edit-employee'},

       //suppliers 
       {path: '/store-supplier', component: StoreSupplier , name: 'store-supplier'},
       {path: '/suppliers', component: Supplier , name: 'suppliers'},
       {path: '/edit-supplier/:id', component: EditSupplier , name: 'edit-supplier'},

         //categories 
         {path: '/store-category', component: StoreCategory , name: 'store-category'},
         {path: '/categories', component: Category , name: 'categories'},
         {path: '/edit-category/:id', component: EditCategory , name: 'edit-category'},
        
         //categories 
         {path: '/store-product', component: StoreProduct , name: 'store-product'},
         {path: '/products', component: Products , name: 'products'},
         {path: '/edit-product/:id', component: EditProduct , name: 'edit-product'},
         {path: '/stock', component: Stock , name: 'stock'},
         {path: '/edit/stock/:id', component: EditStock , name: 'edit-stock'},
         //expenses 
         {path: '/store-expense', component: StoreExpense , name: 'store-expense'},
         {path: '/expenses', component: Expenses, name: 'expenses'},
         {path: '/edit-expense/:id', component: EditExpense , name: 'edit-expense'},

         //expenses 
         {path: '/store-customer', component: StoreCustomer , name: 'store-expense'},
         {path: '/customers', component: Customer, name: 'customers'},
         {path: '/edit-customer/:id', component: EditCustomer , name: 'edit-customer'},
          //expenses 
          {path: '/give-salar', component: salar, name: 'give-salar'},
          {path: '/pay-salar/:id', component: paysalar , name: 'pay-salar'},
          {path: '/salaries', component: Salaries , name: 'salaries'},
          {path: '/view-salar/:id', component: ViewSalary , name: 'view-salar'},
          {path: '/edit-salar/:id', component: EditSalary , name: 'edit-salar'},

          // pos 
          {path: '/pos', component: Pos, name: 'pos'},

        // orders 
        {path: '/orders', component: Order, name: 'orders'},
        {path: '/view-order/:id', component: ViewOrder, name: 'view-order'},
        {path: '/order/search', component: Search, name: 'search'}

          
    ],
    mode: 'history'
})


export default router 