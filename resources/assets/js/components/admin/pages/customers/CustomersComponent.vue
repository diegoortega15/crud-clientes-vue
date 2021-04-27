<template>
  <div>
    <h1>Listagem dos Clientes</h1>

    <div class="row">
        <div class="col">
            <router-link :to="{ name: 'admin.customers.create' }" class="btn btn-success">Cadastrar</router-link>
        </div>
        <div class="col">
            <search @searchCustomer="searchCustomer"></search>
        </div>
    </div>



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
          <td>{{ customer.id }}</td>
          <td>{{ customer.name }}</td>
          <td>{{ customer.email }}</td>
          <td>{{ customer.birthday }}</td>
          <td>{{ customer.address }}</td>
          <td>{{ customer.zip_code }}</td>
          <td>{{ customer.city }}</td>
          <td>{{ customer.state }}</td>
          <td>
            <router-link
              :to="{
                name: 'admin.customers.edit',
                params: { id: customer.id },
              }"
              class="btn btn-info"
            >
              Editar
            </router-link>
            <a
              href="#"
              class="btn btn-danger"
              @click.prevent="confirmDestroy(customer)"
            >
              Remover
            </a>
          </td>
        </tr>
      </tbody>
    </table>

    <ul v-if="customers.data.last_page > 1">
        <li v-if="customers.data.current_page > 1">
            <a href="#" @click.prevent="loadCustomers(customers.data.current_page - 1)">
               Anterior
            </a>
        </li>
        <li v-if="customers.data.current_page < customers.data.last_page">
            <a href="#" @click.prevent="loadCustomers(customers.data.current_page + 1)">
                Próximo
            </a>
        </li>
    </ul>
  </div>
</template>

<script>
import SearchCustomerComponent from './partials/SearchCustomerComponent'



export default{
    created (){
        this.loadCustomers(1)
    },
    // data (){
    //     return{
    //         name: '',
    //     }
    // },
    computed: {
        customers(){
            return this.$store.state.customers.items
        },
        params(){
            return {
                page: this.customers.current_page,
                // name:''
            }
        }
    },
    methods: {
        loadCustomers(page){
            this.$store.dispatch('loadCustomers', {...this.params, page})
        },
        confirmDestroy (customer){
            this.$snotify.error(`Deseja relamente deletar o cliente: ${customer.name}`,'Deletar?',{
                timout: 10000, 
                showProgressBar: true,
                CloseOnCLick:true,
                buttons: [
                    {text: 'Não', action: () => console.log('Não deletou')},
                    {text: 'Sim', action: () => this.destroy(customer)}
                ]
            })
        
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
        },
        searchCustomer(filter){
            this.name = filter.name
            this.page = filter.page
            this.loadCustomers(this.page)
        }
    },
    components: {
        search: SearchCustomerComponent
    }   
}
</script>

<style scoped>
</style>