<template>
    <div>

        <h1>Editar Cliente</h1>
        <form-customer 
          :customer="customer"
          :updating="true">
        </form-customer>
  </div>
</template>

<script>
import axios from 'axios'

import FormCustomerComponent from './partials/FormCustomerComponent'

export default{
   props: {
        id: {
            require: true
        }
   },
   created (){
     this.$store.dispatch('loadCustomer', this.id)
                    .then(response=> this.customer = response)
                    .catch(error => {
                      console.log(error)
                    })
   },
   data(){
     return {
        customer: {}
     }
   },
    components : {
        formCustomer: FormCustomerComponent
    }
}
</script>

<style scoped>

</style>