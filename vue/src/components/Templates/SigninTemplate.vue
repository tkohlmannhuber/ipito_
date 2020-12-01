<template>
  <div class="login-template">
    <SignInForm />
  </div>
</template>

<script>

import SignInForm from "../Partials/SignInForm";

export default {
  name: 'logintemplate',
  components:{
      SignInForm,
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
      width: 100vw;
      display: grid;
      place-items: center;
  }


</style>