<template>
    <div class="signin-form-container">
        <h3>Sign In</h3>
        <form action="#">
            <div class="input-flex">
                <label for="signin_username">Username:</label>
                <input type="text" id="signin_username" />
            </div>
            <div class="input-flex">
                <label for="signin_email">Email:</label>
                <input type="email" id="signin_email" />
            </div>
            <div class="input-flex">
                <label for="signin_password">Password:</label>
                <input type="text" id="signin_password" />
            </div>
            <div class="input-flex">
                <label for="signin_password_rp">Repeat Password:</label>
                <input type="text" id="signin_password_rp" />
            </div>
            <SubmitBtn text="Login" />
        </form>
    </div>
</template>

<script>

import SubmitBtn from "../Partials/SubmitBtn"


export default {
    name: "",
    components: {
      SubmitBtn,
    }
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.signin-form-container {
    width: 30ch;
    margin-bottom: 3em;

    .input-flex {
        margin: 1em 0;
        label {
            font-weight: $textFontWeight;
        }
        input {
            width: 100%;
            background: none;
            border: 1px solid $primaryColor;
            font-size: $textFontSize;
            padding: 0.5em;
            margin: 0.5em 0;
        }
    }
}
</style>
