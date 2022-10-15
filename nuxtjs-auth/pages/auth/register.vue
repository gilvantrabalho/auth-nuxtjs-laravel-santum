<template>
  <div class="cont-register">
    <h4 class="mb-4 mt-3 text-center">Cadastrar-se</h4>

    <form @submit.prevent="submit" action="">
      <InputComponent
        for_id="name"
        label="Nome"
        type="name"
        v-model="user.name"
      />

      <InputComponent
        for_id="email"
        label="E-mail"
        type="email"
        v-model="user.email"
      />

      <InputComponent
        for_id="password"
        label="Senha"
        type="password"
        v-model="user.password"
      />

      <div class="text-center">
        <ButtonComponent
          type="submit"
          title="Entrar"
          classStyle="btn-primary"
        />
      </div>

      <hr />

      <div class="text-center">
        <NuxtLink to="/auth/login"> Login </NuxtLink>
      </div>
    </form>
  </div>
</template>

<style>
.cont-register {
  width: 500px;
}
</style>

<script>
import InputComponent from "../../components/forms/inputs/InputComponent.vue";
import ButtonComponent from "../../components/buttons/ButtonComponent.vue";
import RegisterApi from "../../api/auth/RegisterApi.js";

export default {
  auth: false,
  layout: "auth",
  components: { InputComponent, ButtonComponent },
  data() {
    return {
      user: {
        name: null,
        email: null,
        password: null,
      },
    };
  },
  methods: {
    submit: async function () {
      if (this.user.name && this.user.email && this.user.password) {
        RegisterApi.register(this.user)
          .then((res) => {
            console.log(res.data);
            if (!res.data.error) {
              this.$notify.success({
                title: "Ops",
                message: res.data.response.message,
              });
            } else {
              this.$notify.error({
                title: "Ops",
                message: res.data.response.message,
              });
            }
          })
          .catch((error) => console.log(error));
      } else {
        this.$notify.error({
          title: "Ops",
          message: "Informe os campos obrigatórios!",
        });
      }
    },
  },
};
</script>