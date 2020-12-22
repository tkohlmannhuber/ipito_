<template>
    <div id="app">
        <div>
            <TopHeaderBright v-if="!dashboardRoute" />
            <DashboardHeader v-if="dashboardRoute" />

            <SocialBar v-if="!showCompsOnMobile" />
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
import SocialBar from "./components/Partials/SocialBar";
import TopHeaderBright from "./components/Layout/TopHeaderBright";
import DashboardHeader from "./components/Layout/DashboardHeader";

export default {
    name: "app",
    components: {
        SocialBar,
        TopHeaderBright,
        DashboardHeader,
    },

    data: () => {
        return {
            showCompsOnMobile: true,
            dashboardRoute: false,
        };
    },
    watch: {
        $route() {
            if (this.$route.path === "/account" ) {
                this.dashboardRoute = true;
            } else {
                this.dashboardRoute = false;
            }
        },
    },

    methods: {
        handleMobileComps() {
            this.showCompsOnMobile = window.innerWidth <= 990;
        },
    },

    created() {
        this.handleMobileComps();
    },
    updated() {},
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss">
@import "@/assets/styles/variables.scss";

#app {
    position: absolute;
}
</style>
