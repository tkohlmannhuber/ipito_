<template>
    <div class="login-form-container">
        <h3>Login</h3>
        <form action="#">
            <div class="input-flex">
                <label for="login_email">Email:</label>
                <input
                    type="email"
                    id="login_email"
                    name="login_email"
                    v-model="login.email"
                />
            </div>
            <div class="input-flex">
                <label for="login_password">Password:</label>
                <input type="password" id="login_password" name="login_password" v-model="login.password" />
            </div>
            <SubmitBtn text="Login" :method="loginUser" />
        </form>
    </div>
</template>

<script>
import SubmitBtn from "../Partials/SubmitBtn";
import axios from 'axios';

export default {
    name: "loginform",
    components: {
        SubmitBtn,
    },

    data: () => {
        return {
            login: {
                email: "",
                password: "",
			},
			errors: []
        };
	},

	methods:{
		loginUser(){
			axios
                .post("http://ipito_api.local/api/login", this.login)
                .then(() => {
					this.$router.push({ name: "Account" });
					console.log('logged in')
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
				});
			
        },

	}
};
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

    @include media(">=md"){
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
}
</style>
