<template>
    <div>

        <h1>Listagem dos Clientes</h1>
        
        <router-link :to="{name: 'admin.customers.create'}" class="btn btn-success">Cadastrar</router-link>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>NASC</th>
                    <th>ENDEREÇO</th>
                    <th>CEP</th>
                    <th>CIDADE</th>
                    <th>UF</th>
                    <th width="200">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(customer, index) in customers.data.data" :key="index">
                    <td>{{customer.id}}</td>
                    <td>{{customer.name}}</td>
                    <td>{{customer.email}}</td>
                    <td>{{customer.birthday}}</td>
                    <td>{{customer.address}}</td>
                    <td>{{customer.zip_code}}</td>
                    <td>{{customer.city}}</td>
                    <td>{{customer.state}}</td>
                    <td>
                        <router-link :to="{name: 'admin.customers.edit', params: {id: customer.id}}" class="btn btn-info">
                            Editar
                        </router-link>
                        <a href="#" class="btn btn-danger" @click.prevent="destroy(customer)">
                            Remover
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'

export default{
    created (){
        this.loadCustomers()
    },
    computed: {
        customers(){
            return this.$store.state.customers.items
        }
    },
    methods: {
        loadCustomers(){
            this.$store.dispatch('loadCustomers')
        },

        destroy(customer){
            this.$store.dispatch('destroyCustomer', customer.id)
                        .then(() => {
                            this.$snotify.success(`Sucesso ao deletar o cliente: ${customer.name}`)
                            this.loadCustomers()
                        })
                        .catch( (error) => {
                            console.log(error)

                            this.$snotify.error('Erro ao deletar o cliente', 'Falha')
                        })
        }
    }
}
</script>

<style scoped>

</style>