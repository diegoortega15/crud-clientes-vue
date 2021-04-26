<template>
    <div>
    <ul class="nav bg-dark">
        <li class="nav-item">
            <router-link :to="{name: 'admin.dashboard'}" class="nav-link">Dashboard</router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{name: 'admin.customers'}" class="nav-link">Clientes</router-link>
        </li>
        <li>
            <router-link :to="{name: 'login'}" class="nav-link"> LOGIN</router-link>
        </li>
    </ul>
        <div class="container">
            <router-view></router-view>
        </div>

    </div>
</template>

<script>
export default{
    computed: {
        totalCustomers () {
            this.$store.state.customers.items.data.length
        }
    }
}
</script>

<style>

</style>