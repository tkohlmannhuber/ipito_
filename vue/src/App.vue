<template>
    <div id="app">
      <div>

        <TopHeaderBright />

        <SocialBar v-if="!showCompsOnMobile" />
      </div>
        <router-view></router-view>
    </div>
</template>

<script>
import SocialBar from "./components/Partials/SocialBar";
import TopHeaderBright from "./components/Layout/TopHeaderBright";

export default {
    name: "app",
    components: {
        SocialBar,
        TopHeaderBright,
    },

    data: () => {
        return {
            showCompsOnMobile: true,
        };
    },

    methods: {
        handleMobileComps() {
            this.showCompsOnMobile = window.innerWidth <= 990;
        },
    },

    created() {
        this.handleMobileComps();
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss">
@import "@/assets/styles/variables.scss";

#app {
    position: absolute;
}
</style>
