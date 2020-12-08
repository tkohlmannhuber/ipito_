<template>
    <div class="signin-form-container">
        <h3 v-if="!succesSignin">Sign In</h3>
        <h3 v-if="succesSignin">Congrats! Sign In was successfull!</h3>
        <form action="#" v-if="!succesSignin">
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
            <div>
                <p v-if="errors">{{ errors.username }}</p>
                <p v-if="errors">{{ errors.email }}</p>
                <p v-if="errors">{{ errors.password }}</p>
            </div>
            <Loader v-if="loader" />
            <SubmitBtn
                v-if="showSubmit"
                text="Login"
                :method="saveUser"
                @click.native="showLoader()"
            />
        </form>
    </div>
</template>

<script>
import SubmitBtn from "../Partials/SubmitBtn";
import Loader from "../Partials/Loader";
import axios from "axios";

export default {
    name: "",
    components: {
        SubmitBtn,
        Loader,
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

            succesSignin: false,

            showSubmit: true,

            loader: false,
        };
    },

    methods: {
        saveUser() {
            axios
                .post("http://api.ipito.local/api/register", this.newUser)
                .then(() => {
                    this.succesSignin = true;
                    this.loader = false;
                    this.showSubmit = true;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                    console.log(this.errors);
                    this.loader = false;
                    this.showSubmit = true;
                });
        },

        showLoader() {
            this.loader = true;
            this.showSubmit = false;
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
