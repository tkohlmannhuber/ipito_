<template>
    <div class="mobile-menu-list">
        <div
            v-for="country in countries"
            :key="country.country_title"
            class="menu-item-container"
        >
            <span class="mobile-menu-item">{{ country.country_title }}</span>
            <div class="mobile-menu-item-flex">
                <router-link
                    v-for="spot in country.spots"
                    :key="spot.spot_title"
                    @click.native="
                        method();
                        scrollToTop();
                    "
                    class="sub-mobile-menu-item"
                    :to="{
                        name: 'Spot',
                        params: {
                            title: spot.spot_title,
                            lat: spot.lat,
                            lng: spot.lng,
                            id: spot.id,
                            country: country.country_title,
                        },
                    }"
                    >{{ spot.spot_title }}</router-link
                >
            </div>
        </div>
        <router-link
            class="mobile-menu-item extern-link"
            :to="{ name: 'Moon' }"
            @click.native="
                method();
                scrollToTop();
            "
        >
            Moon
        </router-link>
        <router-link
            v-if="!userData"
            @click.native="
                method();
                scrollToTop();
            "
            class="mobile-menu-item extern-link"
            :to="{ name: 'Login' }"
            >Login</router-link
        >
        <router-link
            v-if="!userData"
            @click.native="
                method();
                scrollToTop();
            "
            class="mobile-menu-item extern-link"
            :to="{ name: 'Signin' }"
            >Sign In</router-link
        >
        <router-link
            v-if="userData"
            @click.native="
                method();
                scrollToTop();
            "
            class="mobile-menu-item extern-link"
            :to="{ name: 'Account', params: { id: 'dashboard' } }"
            >{{ userData.username }}</router-link
        >
        <router-link
            v-if="isAdmin"
            @click.native="
                method();
                scrollToTop();
            "
            class="mobile-menu-item extern-link"
            :to="{ name: 'Admin', params: { id: 'dashboard' } }"
            >Admin Dashboard</router-link
        >

        <button
            v-if="userData"
            @click="
                method();
                scrollToTop();
                logout();
            "
            class="mobile-menu-item extern-link"
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
            isAdmin: "",
        };
    },

    props: {
        method: { type: Function },
    },

    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: "smooth",
            });
        },
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
            this.isAdmin = userData.is_admin;
        });

        axios
            .get("https://api.ipito.surf/api/countries")
            .then((res) => {
                this.countries = res.data;
            })
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
    padding: 3em 2em 1em;
    background: white;
    transition: all 0.5s ease;
    box-shadow: $boxShadow;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;

    @include media(">=xs") {
        width: 50vw;
        align-items: flex-start;
    }
    @include media(">=sm") {
        width: 40vw;
    }
    @include media(">=md") {
        width: 30vw;
    }
    @include media(">=xl") {
        width: 20vw;
        padding: 2em 2em;
    }
    @include media(">=xxl") {
        width: 22vw;
        padding: 3em 2em;
        gap: 1em;
    }
    @include media(">=max-width") {
        width: 15vw;
        padding: 10em 2em;
    }

    .extern-link {
        cursor: pointer;
        outline: none;
        position: relative;

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

    .social-list {
        width: 100%;
        display: flex;
        justify-content: space-around;
        padding-bottom: 1em;

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
    .menu-item-container {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 1em;

        @include media(">=xs") {
            align-items: flex-start;
        }
        @include media(">=md") {
            gap: 0;
        }


        .mobile-menu-item-flex {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .5em;

            @include media(">=xs") {
                align-items: flex-start;
                gap: 1.5em;
            }
            @include media(">=sm") {
                gap: .7em;
            }
            @include media(">=lg") {
                gap: 0.8em;
            }

            .sub-mobile-menu-item {
                position: relative;
                color: $textColor;
                font-size: 1.4em;

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
