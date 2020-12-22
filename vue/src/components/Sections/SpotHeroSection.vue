<template>
    <section class="hero-section">
        <div class="content-wrapper">
            <Headline :title="this.$route.params.title" />
            <div class="hero-data-flex">
                <span>Tide: </span>
                <span>Swell:</span>
                <span>Wind: </span>
                <span>Water:</span>
            </div>
            <!-- <div class="favorite-btn-flex">
                <CircleBtn />
                <span>Add to favorite</span>
            </div> -->
        </div>
    </section>
</template>

<script>
import Headline from "../Partials/Headline";
// import CircleBtn from "../Partials/CircleBtn";
// import axios from "axios";

export default {
    name: "spotherosection",
    components: {
        Headline,
        // CircleBtn,
    },
    props: {
        spot: Object,
    },

    data() {
        return {
            weatherData: null,
            spotLat: null,
            spotLng: null,
            tide: null,
            swell: null,
            wind: null,
            water: null,
        };
    },

    methods: {},

    // updated() {
    //     this.spotLat = this.$route.params.lat;
    //     this.spotLng = this.$route.params.lng;
    //     // console.log(this.spotLat);
    //     // console.log(this.spotLng);

    //     let lat = this.spotLat;
    //     let lng = this.spotLng;
    //     const params = "waterTemperature,windSpeed,swellHeight";

    //     let utcDate = new Date();
    //     let startTime = Math.floor(utcDate.getTime() / 1000);

    //     axios
    //         .get(
    //             `https://api.stormglass.io/v2/weather/point?lat=${lat}&lng=${lng}&params=${params}&start=${startTime}&end=${startTime}`,
    //             {
    //                 headers: {
    //                     Authorization:
    //                         "7383fd56-0a18-11eb-b19c-0242ac130002-7383fe0a-0a18-11eb-b19c-0242ac130002",
    //                 },
    //             }
    //         )
    //         .then((response) => {
    //             console.log(response)
    //             this.weatherData = response.data.hours[0];
    //             console.log(this.weatherData);
    //         })
    //         .catch(() => {
    //             console.log('error');
    //         });
    // },
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
        height: 99%;
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
</style>
