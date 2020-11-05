<template>
    <div class="auth-container">
        <button class="back-btn" v-if="cmp" @click="backToChoose()">
            BACK
        </button>
        <div class="auth-start-flex" v-if="showChoose">
            <h3>Join <span class="red">the</span> community</h3>
            <p>Stay always up to date!</p>
            <TextBtn text="Login here" @click="displayForm('loginform')" />
            <TextBtn text="Sign in here" @click="displayForm('signinform')" />
        </div>
        <component :is="cmp"></component>
    </div>
</template>

<script>
import LoginForm from "../Partials/LoginForm";
import SignInForm from "../Partials/SignInForm";
import TextBtn from "../Partials/TextBtn";

export default {
    name: "auth",
    components: {
        loginform: LoginForm,
        signinform: SignInForm,
        TextBtn,
    },
    data: () => {
        return {
            showChoose: true,
            cmp: "",
        };
    },
    methods: {
        displayForm(item) {
            this.cmp = item;
            this.showChoose = false;
        },

        backToChoose() {
            this.cmp = "";
            this.showChoose = true;
        },
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.auth-container {
    background-image: url("../../assets/images/greenstart-bg.png");
    padding: 2.5em;
    border-radius: $borderRadius;
    display: flex;
    flex-direction: column;
    align-items: flex-start;

    @include media(">=md"){
        padding: 3.5em;
    }

    .auth-start-flex {
        display: flex;
        flex-direction: column;
        gap: 2em;
    }

    .back-btn {
        border: none;
        background: none;
        font-family: $headlineFont;
        border-radius: $borderRadius;
        font-size: $textFontSize;
        padding: 0 0 2em 4em;
        color: $textColor;
        position: relative;
        outline: none;
        cursor: pointer;

        &::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 3em;
            height: 3em;
            background-image: url("../../assets/images/arrow_prev.svg");
            background-repeat: no-repeat;
            transition: all .5s;
        }

        @include media(">=md") {
            padding: 0 0 2em 3em;

            &:hover {
                &::before {
                    transform: translateX(-.5em);
                }
            }

            &::before {
                top: 0.1em;
            }
        }
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
