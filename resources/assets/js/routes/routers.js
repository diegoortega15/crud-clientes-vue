import Vue from 'vue'
import VueRouter from 'vue-router'

import AdminComponent from '../components/admin/AdminComponent'
import CustomersComponent from '../components/admin/pages/customers/CustomersComponent'
import DashboardComponent from '../components/admin/pages/dashboard/DashboardComponent'
import AddCustomerComponent from '../components/admin/pages/customers/AddCustomerComponent'
import EditCustomerComponent from '../components/admin/pages/customers/EditCustomerComponent'
import LoginComponent from '../components/frontend/pages/login/LoginComponent'

Vue.use(VueRouter)

const routes = [
    {path: 'login', component: LoginComponent, name: 'login' },
    {
        path: '/admin',
        component: AdminComponent,
        children: [
            {path: '', component: DashboardComponent, name: 'admin.dashboard'},
            {path: 'customers', component: CustomersComponent, name: 'admin.customers'},
            {path: 'customers/create', component: AddCustomerComponent, name: 'admin.customers.create'},
            {path: 'customers/:id/edit', component: EditCustomerComponent, name: 'admin.customers.edit', props: true}
        ]
    },
]

const router = new VueRouter ({
    routes
})

export default router