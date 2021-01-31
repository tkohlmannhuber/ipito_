<template>
    <header :class="{ sticky: scrollPosition > 0 , stickyDark: isMoon && scrollPosition > 0}">
        <Navbar />
    </header>
</template>

<script>
import Navbar from "../Partials/Nav/Navbar";

export default {
    name: "topheaderbright",
    components: {
        Navbar,
    },
    data() {
        return {
            scrollPosition: null,
            isMoon: false,
        };
    },
    watch: {
        $route() {
            if (this.$route.path === "/moon") {
                this.isMoon = true;
            } else {
                this.isMoon = false;
            }
        },
    },

    methods: {
        updateScroll() {
            this.scrollPosition = window.scrollY;
        },
    },

    mounted() {
        window.addEventListener("scroll", this.updateScroll);
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

header {
    position: fixed;
    z-index: 100;

    .wrapper {
        padding: 1.87em 2.5em;
    }
}
.sticky {
    background: rgba(255, 255, 255, 0.98);
    box-shadow: $boxShadow;
    .wrapper {
        padding: 1em 2em;
    }
}
.stickyDark {
    background: rgba(0, 0, 0, 0.5);
    box-shadow: $boxShadow;
}
</style>
