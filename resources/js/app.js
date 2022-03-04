require('./bootstrap');
import Vue from 'vue'
import router from './router'
// users
import User  from './Helpers/User';
window.User  = User
// notification 
import Notification from './Helpers/Notification';
window.Notification = Notification
// start sweet alert 
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  window.Toast = Toast
// end sweet alert
window.Reload = new Vue()
const app = new Vue({
    el: '#app',
    router,
});
 