<template>
    <nav class="wrapper">
        <router-link to="/">
            <Logo />
        </router-link>

        <NavBright :class="{ open: showNav }"/>

        <button :class="{ close_btn: !showNav }" @click="toggleNav()"></button>

    </nav>
</template>

<script>
// import CircleBtn from "../Partials/CircleBtn";
import Logo from "../Partials/Logo";
import NavBright from "../Partials/NavBright";

export default {
    name: "navbar",
    components: {
        Logo,
        NavBright,
    },
    data: () => {
        return {
            showNav: true,
        };
    },

    methods: {
        toggleNav() {
            this.showNav = !this.showNav;
        }
    }
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

button {
    background: $tertiaryColor;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 2.5em;
    height: 2.5em;
    border-radius: 100%;
    box-shadow: $boxShadow;
    transition: all 0.5s ease;
    border: none;
    outline: none;
    z-index: 1;
    position: relative;

    &::after{
        content: '';
        width: .1em;
        height: 1.2em;
        position: absolute;
        background: $primaryColor;
        border-radius: 1em;
    }
    &::before{
        content: '';
        width: .1em;
        height: 1.2em;
        position: absolute;
        background: $primaryColor;
        border-radius: 1em;
        transform: rotate(90deg);
    }


    @include media(">=xs") {
        width: 3em;
        height: 3em;
        cursor: pointer;

        &:hover {
            transform: scale(1.1) rotate(90deg);
        }
    }
}

.close_btn{
    transform: rotate(45deg);
}

</style>
