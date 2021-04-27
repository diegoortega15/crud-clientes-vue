<template>
    <div>
        <form action="" class="form form-inline" @submit.prevent="search">
            <input type="text" v-model="filter" placeholder="Pesquisar cliente" class="form-control mr-sm-2">
            <button type="submit" class="btn btn-outline-success">Pesquisar</button>
        </form>
    </div>
</template>

<script>
export default {
    data (){
        return {
            filter: ''
        }
    },
    methods: {
        search (){
            this.$emit('searchCustomer', this.filter)
        }
    }
}
</script>
