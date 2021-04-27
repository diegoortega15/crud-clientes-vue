<template>
  <div>
    <form class="form" @submit.prevent="onSubmit">
      <div :class="['form-group', { 'has-error': errors.name }]">
        <div v-if="errors.name">{{ errors.name[0] }}</div>
        <input
          type="text"
          v-model="customer.name"
          class="form-control"
          placeholder="Nome Cliente"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.email }]">
        <div v-if="errors.email">{{ errors.email[0] }}</div>
        <input
          type="text"
          v-model="customer.email"
          class="form-control"
          placeholder="Email"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.birthday }]">
        <div v-if="errors.birthday">{{ errors.birthday[0] }}</div>
        <input
          type="text"
          v-model="customer.birthday"
          class="form-control"
          placeholder="Data de Nascimento YYYY-MM-DD"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.address }]">
        <div v-if="errors.address">{{ errors.address[0] }}</div>
        <input
          type="text"
          v-model="customer.address"
          class="form-control"
          placeholder="Endereço"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.zip_code }]">
        <div v-if="errors.zip_code">{{ errors.zip_code[0] }}</div>
        <input
          type="text"
          v-model="customer.zip_code"
          class="form-control"
          placeholder="CEP"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.city }]">
        <div v-if="errors.city">{{ errors.city[0] }}</div>
        <input
          type="text"
          v-model="customer.city"
          class="form-control"
          placeholder="Cidade"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.state }]">
        <div v-if="errors.state">{{ errors.state[0] }}</div>
        <input
          type="text"
          v-model="customer.state"
          class="form-control"
          placeholder="Estado"
        />
      </div>
      <div :class="['form-group', { 'has-error': errors.name }]">
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
      type: Object | Array,
      default: () => {
        return {
          id: "",
          name: "",
          email: "",
          birthday: "",
          address: "",
          zip_code: "",
          city: "",
          state: "",
        };
      },
    },
    updating: {
      require: false,
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      errors: {},
    };
  },
  methods: {
    onSubmit() {
      const action = this.updating ? "updateCustomer" : "storeCustomer";

      this.$store
        .dispatch(action, this.customer)
        .then(() => {  
                this.$snotify.success('Sucesso ao cadastrar')

                this.$router.push({ name: "admin.customers" })
            })
        .catch((error) => {
            this.$snotify.error('Algo Errado', 'Erro')

          console.log(error.response.data.errors);
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style scoped>
.has-error {
  color: red;
}
.has-error input {
  border: 1px solid red;
}
</style>