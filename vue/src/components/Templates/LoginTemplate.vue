<template>
  <div class="login-template">
    <LoginForm />
  </div>
</template>

<script>

import LoginForm from "../Partials/LoginForm";

export default {
  name: 'logintemplate',
  components:{
      LoginForm,
  } 
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .login-template{
      background-image: url("../../assets/images/login_bg.png");
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
      width: 100%;
      display: grid;
      place-items: center;
  }


</style>