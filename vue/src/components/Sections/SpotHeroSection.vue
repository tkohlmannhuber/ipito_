<template>
    <section class="hero-section">
        <div class="content-wrapper">
            <Headline :title="this.$route.params.id" />
            <div class="hero-data-flex">
                <span>Tide: {{ weatherData.type }}</span>
                <span>Swell: </span>
                <span>Wind: </span>
                <span>Water:</span>
            </div>
            <div class="favorite-btn-flex">
                <CircleBtn />
                <span>Add to favorite</span>
            </div>
        </div>
    </section>
</template>

<script>
import Headline from "../Partials/Headline";
import CircleBtn from "../Partials/CircleBtn";
// import axios from "axios";

export default {
    name: "spotherosection",
    components: {
        Headline,
        CircleBtn,
    },

    data() {
        return {
            weatherData: [],
        };
    },

    methods: {
        //   getData() {
        //     fetch(
        //       `https://api.stormglass.io/v2/tide/extremes/point?lat=38.971726&lng=-9.418499&start=2019-03-15&end=2019-03-15`,
        //       {
        //         headers: {
        //           Authorization:
        //             "708765e4-e2f8-11ea-be2e-0242ac130002-70876698-e2f8-11ea-be2e-0242ac130002",
        //         },
        //       }
        //     )
        //       .then((response) => response.json())
        //       .then((jsonData) => {
        //         this.weatherData = jsonData.meta;
        //         console.log(this.weatherData);
        //       });
        //   },
        // },
        //     getData() {
        //         axios
        //             .get(
        //                 "https://api.stormglass.io/v2/tide/extremes/point?lat=48.210033&lng=-16.363449&start=2020-10-28&end=2020-10-29",
        //                 {
        //                     headers: {
        //                         Authorization:
        //                             "708765e4-e2f8-11ea-be2e-0242ac130002-70876698-e2f8-11ea-be2e-0242ac130002",
        //                     },
        //                 }
        //             )
        //             .then((res) => {
        //                 this.weatherData = res.data.data;
        //                 console.log(this.weatherData);
        //             });
        //     },
        // },
        // created() {
        //     this.getData();
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

// background-image: url('../../assets/images/bg-light-blue.png');
.hero-section {
    display: flex;
    max-width: 1920px;
    align-items: center;
    margin: 0 auto;
    background-size: cover;
    position: relative;

    @include media(">=md") {
        background-image: url("../../assets/images/back_cut.png");
        background-size: cover;
        height: 100vh;
    }

    &::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;

        @include media(">=md") {
            background-image: url("../../assets/images/hero_img.jpg");
            background-size: cover;
        }
    }

    .content-wrapper {
        margin-top: 8em;
        max-width: 70ch;

        @include media(">=md") {
            margin-top: 0em;
        }

        .hero-data-flex {
            margin: 2em 0;
            display: flex;
            flex-direction: column;
            gap: 1em;

            span {
                color: $primaryColor;
                font-weight: $textFontWeight;
            }
        }
        .favorite-btn-flex {
            display: flex;
            align-items: center;
            span {
                margin-left: 0.5em;
            }
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
