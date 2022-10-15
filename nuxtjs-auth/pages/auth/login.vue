<template>
  <div class="cont-login">
    <h4 class="mb-4 mt-3 text-center">LOGIN</h4>
    {{ $auth.user }}
    <form @submit.prevent="submit" action="">
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
        <NuxtLink to="/auth/register"> Cadastrar-se </NuxtLink>
      </div>
    </form>
  </div>
</template>

<style>
.cont-login {
  width: 400px;
}
</style>

<script>
import InputComponent from "../../components/forms/inputs/InputComponent.vue";
import ButtonComponent from "../../components/buttons/ButtonComponent.vue";

export default {
  layout: "auth",
  components: { InputComponent, ButtonComponent },
  data() {
    return {
      user: {
        email: null,
        password: null,
      },
    };
  },
  methods: {
    testClick: function () {
      console.log("funcionou");
    },
    submit: async function () {
      if (this.user.email && this.user.password) {
        try {
          let response = await this.$auth.loginWith("local", {
            data: this.user,
          });
          console.log(response);
        } catch (err) {
          console.log(err);
        }
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