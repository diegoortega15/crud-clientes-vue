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
        this.loadCustomer()
   },
   methods: {
     loadCustomer (){
       this.$store.dispatch('loadCustomer', this.id)
                 .then(response=> this.customer = response)
                 .catch(error => {
                    this.$snotify.error('Categoria não encontrada', '404')
                    this.$router.push({name: 'admin.customers'})
                 })
     }
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