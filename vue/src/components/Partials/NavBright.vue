<template>
    <div class="mobile-menu-list">
        <span class="mobile-menu-item">Spain</span>
        <div class="mobile-menu-item-flex">
            <div class="sub-mobile-menu-flex">
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'mundaka-spain' } }"
                    >Mundaka</router-link
                >
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'razo' } }"
                    >Razo</router-link
                >
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'Nemiña' } }"
                    >Nemiña</router-link
                >
            </div>
        </div>
        <span class="mobile-menu-item">France</span>
        <div class="mobile-menu-item-flex">
            <div class="sub-mobile-menu-flex">
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'baie-des-trépassés' } }"
                    >Baie des Trépassés</router-link
                >
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'les-conches' } }"
                    >Les Conches</router-link
                >
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'côte-sauvage' } }"
                    >Côte-sauvage</router-link
                >
            </div>
        </div>
        <span class="mobile-menu-item">Portugal</span>
        <div class="mobile-menu-item-flex">
            <div class="sub-mobile-menu-flex">
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'ericeira' } }"
                    >Ericeira</router-link
                >
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'nazare' } }"
                    >Nazare</router-link
                >
                <router-link
                    class="sub-mobile-menu-item"
                    :to="{ name: 'Spot', params: { id: 'peniche' } }"
                    >Peniche</router-link
                >
            </div>
        </div>
        <router-link class="mobile-menu-item extern-link" :to="{ name: 'Moon' }"
            >Moon</router-link
        >
        <router-link
            class="mobile-menu-item extern-link"
            :to="{ name: 'Login' }"
            >Login</router-link
        >
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
export default {
    name: "navbright",
    data: () => {
        return {
            mobileView: true,
        };
    },

    methods: {
        handleView() {
            this.mobileView = window.innerWidth <= 990;
        },
    },
    created() {
        this.handleView();
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
    }
}
</style>
