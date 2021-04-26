<template>
    <div>
        <form class="form" @submit.prevent="onSubmit">
            <div class="form-group">
                <input type="text" v-model="customer.name" class="form-control" placeholder="Nome Cliente">
            </div>
            <div class="form-group">
                <input type="text" v-model="customer.email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" v-model="customer.birthday" class="form-control" placeholder="Data de Nascimento YYYY-MM-DD">
            </div>
            <div class="form-group">
                <input type="text" v-model="customer.address" class="form-control" placeholder="Endereço">
            </div>
            <div class="form-group">
                <input type="text" v-model="customer.zip_code" class="form-control" placeholder="CEP">
            </div>
            <div class="form-group">
                <input type="text" v-model="customer.city" class="form-control" placeholder="Cidade">
            </div>
            <div class="form-group">
                <input type="text" v-model="customer.state" class="form-control" placeholder="Estado">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

    </div>
</template>

<script>
export default {
    props: {
            customer: {
                require: false,
                type: Object|Array,
                default: () => {
                    return{
                        id:'',
                        name: '',
                        email: '',
                        birthday: '',
                        address: '',
                        zip_code: '',
                        city: '',
                        state: ''
                    }
                }

            },
            updating: {
                require:false,
                type: Boolean,
                default: false,
            }
    },
    methods:{
        onSubmit() {

            const action = this.updating ? 'updateCustomer': 'storeCustomer'

             this.$store.dispatch(action, this.customer)
                            .then(() => this.$router.push({name: 'admin.customers'}))
                            .catch()
        }
    }
    
}
</script>

<style scoped>

</style>