export default{
    state:{
        items: {
            data: []
        },    
    },
    mutations: {
        LOAD_CUSTOMERS (state, customers) {
            state.items = customers
        }
    },
    actions: {
        loadCustomers(context, params) {
            context.commit('PRELOADER',true)

            axios.get('/api/customers', {params})
                .then(response => {
                    console.log(response)
                    
                    context.commit('LOAD_CUSTOMERS', response)
                })
            .catch(errors => {
                console.log(errors)
            })
            .finally(() => context.commit('PRELOADER',false))
        },


        loadCustomer(context, id){
            context.commit('PRELOADER',true)

            return new Promise((resolve, reject)=> {
                axios.get(`/api/customers/${id}`)
                        .then(response=> resolve(response.data))
                        .catch(error => reject(error))
                        .finally(()=>context.commit('PRELOADER',false))
            })

        },

        storeCustomer (context, params){
            context.commit('PRELOADER',true)

            return new Promise((resolve, reject)=> {
                axios.post('/api/customers', params)
                        .then(response=> resolve())
                        .catch(error => reject(error))
                        .finally(()=>context.commit('PRELOADER',false))
            })
        },

        updateCustomer (context, params) {
            return new Promise((resolve, reject)=> {
                axios.put(`/api/customers/${params.id}`, params)
                        .then(response=> resolve())
                        .catch(error => reject(error))
                        .finally(()=>context.commit('PRELOADER',false))
            })
        },

        destroyCustomer (context, id){
            context.commit('PRELOADER',true)

            return new Promise((resolve, reject)=> {
                axios.delete(`/api/customers/${id}`)
                        .then(response=> resolve())
                        .catch(error => reject(error))
                        //.finally(()=>context.commit('PRELOADER',false))
            })
        }
    },
    getters:{

    }
}