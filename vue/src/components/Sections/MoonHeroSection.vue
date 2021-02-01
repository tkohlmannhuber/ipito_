<template>
    <section class="moon-hero-section" id="scene">
        <img src="../../assets/images/moon-bg.jpg" alt="Stars Image" />
        <div class="headline-container content-wrapper">
            <Headline
                class="moon-headline "
                title="Lets Talk about Moon and Tides"
            />
        </div>
        <MoonBg />
        <!-- <MoonPhaseControll /> -->
    </section>
</template>

<script>
import Headline from "../Partials/Headline";
import MoonBg from "../Partials/MoonBg";




export default {
    name: "herosection",
    components: {
        Headline,
        MoonBg,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.moon-hero-section {
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    overflow: hidden;

    @include media('>=md'){
        height: 130vh;
    }

    img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
    }

    &::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 80%;
        bottom: 0;
        background: linear-gradient(
            180deg,
            rgba(0, 0, 0, 0) 0%,
            rgba(0, 0, 0, 1) 100%
        );
    }

    .headline-container {
        width: 100%;
        margin-top: 10em;
        z-index: 1;
        .moon-headline {
            color: rgba(white, 0.95);
            max-width: 20ch;
        }
    }


}
</style>
