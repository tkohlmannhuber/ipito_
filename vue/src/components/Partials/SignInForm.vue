<template>
    <div class="signin-form-container">
        <h3>Sign In</h3>
        <form action="#">
            <div class="input-flex">
                <label for="signin_username">Username:</label>
                <input
                    type="text"
                    id="signin_username"
                    v-model="newUser.username"
                    name="sigin_username"
                />
            </div>
            <div class="input-flex">
                <label for="signin_email">Email:</label>
                <input
                    type="email"
                    id="signin_email"
                    v-model="newUser.email"
                    name="signin_email"
                />
            </div>
            <div class="input-flex">
                <label for="signin_password">Password:</label>
                <input
                    type="password"
                    id="signin_password"
                    v-model="newUser.password"
                    name="signin_password"
                />
            </div>
            <div class="input-flex">
                <label for="signin_password_rp">Confirm Password:</label>
                <input
                    type="password"
                    id="signin_password_rp"
                    v-model="newUser.password_confirmation"
                    name="signin_password_rp"
                />
            </div>
            <SubmitBtn text="Login" :method="saveUser" />
        </form>
    </div>
</template>

<script>
import SubmitBtn from "../Partials/SubmitBtn";
import axios from "axios";

export default {
    name: "",
    components: {
        SubmitBtn,
    },

    data: () => {
        return {
            newUser: {
                username: "",
                email: "",
                password: "",
                password_confirmation: "",
            },

            errors: [],
        };
    },

    methods: {
        saveUser() {
            axios
                .post("http://api.ipito.local/api/register", this.newUser)
                .then(() => {
                    console.log("saved");
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.signin-form-container {
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
}
</style>
