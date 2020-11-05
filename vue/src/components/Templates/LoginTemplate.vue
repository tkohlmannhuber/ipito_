<template>
  <div class="login-template">
    <Auth />
  </div>
</template>

<script>

import Auth from "../Partials/Auth";

export default {
  name: 'logintemplate',
  components:{
      Auth,
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