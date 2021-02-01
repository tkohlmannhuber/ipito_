<template>
    <div id="app">
        <div>
            <TopHeaderBright v-if="!dashboardRoute" />
            <DashboardHeader v-if="dashboardRoute" />

            <SocialBar v-if="!showCompsOnMobile" />
        </div>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
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
            if (this.$route.path === "/account/dashboard" || this.$route.path === "/account/posts" || this.$route.path === "/account/edit"|| this.$route.path === "/admin/dashboard") {
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

.fade-enter , .fade-leave-to{
    opacity: 0;
}

.fade-enter-active, .fade-leave-active{
    transition: all .8s ease;
}
</style>
