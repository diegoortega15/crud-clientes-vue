<template>
    <div>
        <h1> Adicionar novo cliente </h1>
        
        <form-customer></form-customer>
    </div>
</template>

<script>

import FormCustomerComponent from './partials/FormCustomerComponent'

export default{

    components : {
        formCustomer: FormCustomerComponent
    }
    
}
</script>

<style scoped>

</style>