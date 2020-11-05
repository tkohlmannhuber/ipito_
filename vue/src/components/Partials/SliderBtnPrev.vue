<template>
    <button>
        <img src="@/assets/images/arrow_prev.svg" alt="prev button arrow">
    </button>
</template>

<script>
export default {
    name: "sliderbtnprev",
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

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

    img {
        width: 5em;
        transform: translateX(1.5em);
            transition: all .5s;

    }

    &:hover,
    :active {
        img {
            transform: translateX(1em);
        }
    }

    @include media(">=xs") {
        width: 3em;
        height: 3em;
        cursor: pointer;

    }
}
</style>
