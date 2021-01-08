<template>
    <section class="hero-section">
        <div class="content-wrapper">
            <Headline class="hero-head" title="yey dude, wanna surf" />
            <p>
                Sand bottom jumbled shorebreak send it monsters. Wave kook in da
                wa spit Nat Young, hollow pose on the nose, sets keyhole big
                finner? Back dooring reef kook of the day pitter dredging,
                double-up longboard smooth quad fin the OB.
            </p>
        </div>
        <TeaserCard />
    </section>
</template>

<script>
import TeaserCard from "../Partials/TeaserCard";
import Headline from "../Partials/Headline";

export default {
    name: "herosection",
    components: {
        TeaserCard,
        Headline,
    },
    data: () => {
        return {
            showTeaser: true,
        };
    },

    methods: {
        handleTeaser() {
            this.showTeaser = window.innerWidth <= 990;
        },
    },

    created() {
        this.handleTeaser();
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.hero-section {
    display: flex;
    align-items: center;
    flex-direction: column;
    margin: 0 auto;
    position: relative;
    margin-bottom: 2.5em;
    overflow: hidden;

    @include media(">=md") {
        flex-direction: row;
        background-image: url("../../assets/images/back_cut.png");
        background-size: cover;
        height: 100vh;
        margin-bottom: 0em;


        &::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 95%;
            background-image: url("../../assets/images/bg-light-blue.png");
            z-index: -1;
        }
        &::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("../../assets/images/worldmap.svg");
            background-repeat: no-repeat;
            transform: translate(60em, 5em);
            z-index: -1;
            overflow: hidden;

            @include media(">max-width") {
                transform: translate(90em, 15em);
            }
        }

        .hero-head {
            z-index: 3;
        }
    }

    .content-wrapper {
        margin-top: 8em;
        max-width: 70ch;

        @include media(">=md") {
            margin-top: 5em;
        }
    }
}
// &::before{
//     content: '';
//     position: absolute;
//     width: 100vw;
//     height: 100vh;
//     background-image: url('../../assets/images/hero-overlay.svg');
//     z-index : 1;
// }
</style>
