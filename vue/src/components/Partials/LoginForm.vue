<template>
    <div class="login-form-container">
        <h3 v-if="!authStates[0].success">Login</h3>
        <div v-if="authStates[0].success">
            <h3>Login was successfull!</h3>
        </div>
        <form action="#" v-if="!authStates[0].authenticated" @submit.prevent="submit">
            <div class="input-flex">
                <label for="login_email">Email:</label>
                <input
                    type="email"
                    id="login_email"
                    name="login_email"
                    v-model="loginForm.email"
                />
            </div>
            <div class="input-flex">
                <label for="login_password">Password:</label>
                <input
                    type="password"
                    id="login_password"
                    name="login_password"
                    v-model="loginForm.password"
                />
            </div>
            <div v-if="authStates[0].errors" class="error-container">
                <p class="error-msg">
                    Email and Password do not match! Try Again!
                </p>
            </div>
            <!-- <SubmitBtn text="Login" :method="loginUser" /> -->
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
// import SubmitBtn from "../Partials/SubmitBtn";
// import axios from "axios";
import { mapActions, mapGetters } from "vuex";

export default {
    name: "loginform",
    components: {
        // SubmitBtn,
    },

    data: () => {
        return {
            loginForm: {
                email: "",
                password: "",
            },
        };
    },
    computed: mapGetters(["authStates"]), 

    methods: {
        ...mapActions(["login"]),

        async submit () {
        await this.login(this.loginForm)
        }
    },

    // methods: {
    //     loginUser() {
    //         axios
    //             .post("http://ipito_api.local/api/login", this.login)
    //             .then((res) => {
    //                 // this.$router.push({ name: "Account" });
    //                 this.login.email = res.data.email;
    //                 this.login.username = res.data.username;
    //                 this.authenticated = true;
    //                 this.success = true;
    //             })
    //             .catch(() => {
    //                 this.errors = true;
    //             });
    //     },

    // methods: {
    //   ...mapActions({
    //     login: 'auth/login'
    //   }),

    //   async submit () {
    //     await this.login(this.login)

    //     this.$router.replace({ name: 'Home' })
    //   }
    // },
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.login-form-container {
    background-image: url("../../assets/images/greenstart-bg.png");
    padding: 2.5em;
    border-radius: $borderRadius;
    display: flex;
    flex-direction: column;
    align-items: flex-start;

    @include media(">=md") {
        padding: 3.5em;
    }

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
    .error-container {
        margin-bottom: 1em;
    }
}
</style>
