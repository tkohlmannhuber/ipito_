<template>
    <nav class="wrapper">
        <router-link to="/">
            <Logo />
        </router-link>

        <NavBright :class="{ open: showNav }" />

        <CircleBtn @click.native="(showNav = !showNav)" />
    </nav>
</template>

<script>
import CircleBtn from "../Partials/CircleBtn";
import Logo from "../Partials/Logo";
import NavBright from "../Partials/NavBright";

export default {
    name: "navbar",
    components: {
        CircleBtn,
        Logo,
        NavBright,
    },
    data: () => {
        return {
            showNav: true,
        };
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

nav {
    width: 100vw;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.5s ease;
}
.open {
    transform: translateX(100%);
}
</style>
