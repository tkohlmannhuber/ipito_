<template>
    <div class="mobile-menu-list">
        <div v-for="country in countries" :key="country.country_title">
            <span class="mobile-menu-item">{{ country.country_title }}</span>
            <div class="mobile-menu-item-flex">
                <div class="sub-mobile-menu-flex">
                    <router-link
                        v-for="spot in country.spots"
                        :key="spot.spot_title"
                        v-on:click="method()"
                        class="sub-mobile-menu-item"
                        :to="{
                            name: 'Spot',
                            params: { title: spot.spot_title, lat: spot.lat, lng: spot.lng, id: spot.id},
                            
                        }"
                        >{{ spot.spot_title }}</router-link
                    >
                </div>
            </div>
        </div>
        <router-link class="mobile-menu-item extern-link" :to="{ name: 'Moon' }"
            >Moon</router-link
        >
        <router-link
            v-if="!userData"
            class="mobile-menu-item extern-link"
            :to="{ name: 'Login' }"
            >Login</router-link
        >
        <router-link
            v-if="!userData"
            class="mobile-menu-item extern-link"
            :to="{ name: 'Signin' }"
            >Sign In</router-link
        >
        <router-link
            v-if="userData"
            class="mobile-menu-item extern-link"
            :to="{ name: 'Account' }"
            >{{ userData.username }}</router-link
        >
        <button
            v-if="userData"
            class="mobile-menu-item extern-link"
            @click="logout()"
        >
            logout
        </button>
        <div class="social-list" v-if="mobileView">
            <a href="#">
                <i class="scial_icon fab fa-instagram fa-lg"></i>
            </a>
            <a href="#">
                <i class="scial_icon fab fa-twitter fa-lg"></i>
            </a>
        </div>
    </div>
</template>

<script>
// import { mapGetters, mapActions } from "vuex";
import userDataService from "@/services/userDataService";
import axios from "axios";

export default {
    name: "NavList",

    data: () => {
        return {
            mobileView: true,
            userData: null,
            countries: [],
        };
    },

    props: {
        method: { type: Function },
    },

    methods: {
        handleView() {
            this.mobileView = window.innerWidth <= 990;
        },

        logout() {
            localStorage.removeItem("token");

            // redirect auf die Startseite nach 3 Sekunden
            setTimeout(() => {
                // wenn der User mit vuex (im global store) verwaltet werden würde, wäre hier ein reload nicht notwendig
                window.location.href = "/";
            }, 3000);
        },
    },

    created() {
        this.handleView();

        userDataService.me().then((userData) => {
            this.userData = userData;
        });

        axios
            .get("http://api.ipito.local/api/countries")
            .then((res) => {
                this.countries = res.data;
            })
            .catch(() => {
                console.log("no data");
            });
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.mobile-menu-list {
    position: absolute;
    top: 0;
    height: 100vh;
    width: 100vw;
    right: 0;
    padding: 5em 2em;
    background: white;
    display: grid;
    place-items: center start;
    transition: all 0.5s ease;
    box-shadow: $boxShadow;

    @include media(">=xs") {
        width: 50vw;
    }
    @include media(">=sm") {
        width: 30vw;
    }
    @include media(">=md") {
        width: 20vw;
    }

    .social-list {
        width: 100%;
        display: flex;
        justify-content: space-around;
        padding-bottom: 3em;

        a {
            background: $tertiaryColor;
            width: 3em;
            height: 3em;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: $primaryColor;
        }
    }

    .mobile-menu-item-flex {
        display: flex;
        flex-direction: column;

        .sub-mobile-menu-flex {
            display: flex;
            flex-direction: column;
            gap: 1em;

            .sub-mobile-menu-item {
                position: relative;
                display: inline;
                color: $textColor;

                &::after {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 2px;
                    bottom: 0;
                    left: 0;
                    background-color: $tertiaryColor;
                    visibility: hidden;
                    transform: scaleX(0);
                    transition: all 0.3s ease-in-out 0s;
                }

                &:hover::after {
                    visibility: visible;
                    transform: scaleX(1);
                }
            }
        }
    }
    .mobile-menu-item {
        color: $primaryColor;
        font-weight: $textFontWeight;
        font-family: $headlineFont;
        font-size: $h3FontSize;
        text-transform: uppercase;
        border: none;
        background: none;
        margin: 0;
        padding: 0;
    }
}
</style>
