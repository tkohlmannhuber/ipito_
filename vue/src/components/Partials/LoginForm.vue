<template>
  <div class="login-form-container">
    <h3>Login</h3>
    <form action="#">
      <div class="input-flex">
        <label for="login_username">Username:</label>
        <input type="text" id="login_username">
      </div>
      <div class="input-flex">
        <label for="login_password">Password:</label>
        <input type="text" id="login_password">
      </div>
      <SubmitBtn text="Login" />
    </form>
  </div>
</template>

<script>

import SubmitBtn from "../Partials/SubmitBtn"

export default {
  name: 'loginform',
  components: {
    SubmitBtn,
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

.login-form-container{
  width: 30ch;


  .input-flex{
    margin: 1em 0;
    label{
      font-weight: $textFontWeight;
    }
    input{
      width: 100%;
      background: none;
      border: 1px solid $primaryColor;
      font-size: $textFontSize;
      padding: .5em;
      margin: .5em 0;
    }
  }
}

</style>