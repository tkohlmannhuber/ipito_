<template>
    <div class="login-form-container">
        <h3 v-if="!success">Login</h3>
        <transition name="fade">
            <div v-if="success">
                <h3>Login was successfull!</h3>
            </div>
        </transition>
        <form action="#" v-if="!success">
            <div class="input-flex">
                <label for="login_email">Email:</label>
                <input
                    type="email"
                    id="login_email"
                    name="login_email"
                    v-model="credentials.email"
                />
            </div>
            <div class="input-flex">
                <label for="login_password">Password:</label>
                <input
                    type="password"
                    id="login_password"
                    name="login_password"
                    v-model="credentials.password"
                />
            </div>
            <div v-if="error" class="error-container">
                <p class="error-msg">
                    {{ error }}
                </p>
            </div>
            <Loader v-if="loading" />

            <SubmitBtn text="Login" :method="loginUser" v-if="!loading" />
        </form>
    </div>
</template>

<script>
import Loader from "../Partials/Loader";
import userDataService from "@/services/userDataService";
import SubmitBtn from "../Partials/SubmitBtn";

export default {
    name: "loginform",
    components: {
        SubmitBtn,
        Loader,
    },
    data: () => ({
        // daten
        credentials: {},

        // hilfsvariablen
        loading: false,
        error: null,
        token: null,
        success: false,
        editMode: false,
    }),

    methods: {
        loginUser: function(e) {
            // das "Standardverhalten" von form-submit verhindern (sonst würde die Seite neu laden)
            e.preventDefault();

            // den Button deaktivieren, während gespeichert wird (um doppelte Erstellungen zu verhindern)
            this.loading = true;

            // Nun wird der Laravel Speicher Endpunkt aufgerufen
            userDataService
                .login(this.credentials)
                .then((loginData) => {
                    this.success = true;
                    this.token = loginData.token;

                    // Speicher den token, so dass wir ihn später jederzeit holen können
                    localStorage.setItem("token", loginData.token);

                    // den Bearbeitungsmodus wieder deaktivieren
                    this.loading = false;

                    // redirect auf die Startseite nach 3 Sekunden
                    setTimeout(() => {
                        // wenn der User mit vuex (im global store) verwaltet werden würde, wäre hier ein reload nicht notwendig
                        window.location.href = "/";
                    }, 3000);
                })
                .catch(async (error) => {
                    alert("FEHLER: " + error.response.data.message);

                    // den Bearbeitungsmodus wieder deaktivieren
                    this.loading = false;
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
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
