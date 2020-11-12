<template>
    <div class="forecast-day-flex">
        <div class="slider_controll_container">
            <SliderBtnPrev @click.native="showPrev" class="slider-btn" />
            <span class="slider-text">22.10 - 29.10</span>
            <SliderBtnNext @click.native="showNext" class="slider-btn" />
        </div>

        <VueSlickCarousel v-bind="settings" ref="carousel">
            <div
                v-for="weekday in weekdays"
                :key="weekday.day"
                class="forecast-slide"
            >
                <div class="single-day-container">
                    <h3>{{ weekday.day }}</h3>
                    <p>{{ weekday.wave }}</p>
                    <p>Low Tide: {{ weekday.lTide }}</p>
                    <p>High Tide: {{ weekday.hTide }}</p>
                    <p>{{ weekday.moon }}</p>
                    <p>{{ weekday.wind }}</p>
                    <p>{{ weekday.temp }}</p>
                </div>
            </div>
        </VueSlickCarousel>
    </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import SliderBtnPrev from "../Partials/SliderBtnPrev";
import SliderBtnNext from "../Partials/SliderBtnNext";

export default {
    name: "forecastsingleday",
    components: {
        VueSlickCarousel,
        SliderBtnNext,
        SliderBtnPrev,
    },
    data: () => {
        return {
            settings: {
                slidesToShow: 5,
                speed: 500,
                centerPadding: "20px",
                slidesToScroll: 1,
                responsive: [
                                      {
                        breakpoint: 1440,
                        settings: {
                            slidesToShow: 3,
                            
                        },
                    },

                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            
                        },
                    },
                ],
            },
            weekdays: [
                {
                    day: "monday",
                    date: "20.10.2020",
                    wave: "3ft - 4ft",
                    lTide: "12:30",
                    hTide: "0:30",
                    moon: "Full-Moon",
                    wind: "On-Shore",
                    temp: "20°",
                },
                {
                    day: "thuesday",
                    date: "21.10.2020",
                    wave: "2ft - 3ft",
                    lTide: "13:30",
                    hTide: "1:30",
                    moon: "Full-Moon",
                    wind: "Off-Shore",
                    temp: "17°",
                },
                {
                    day: "wednesday",
                    date: "22.10.2020",
                    wave: "3.5ft - 4ft",
                    lTide: "14:30",
                    hTide: "2:30",
                    moon: "Full-Moon",
                    wind: "On-Shore",
                    temp: "19°",
                },
                {
                    day: "thursday",
                    date: "23.10.2020",
                    wave: "1ft - 2ft",
                    lTide: "15:30",
                    hTide: "3:30",
                    moon: "Full-Moon",
                    wind: "Off-Shore",
                    temp: "23°",
                },
                {
                    day: "friday",
                    date: "24.10.2020",
                    wave: "0.5ft - 2ft",
                    lTide: "16:30",
                    hTide: "4:30",
                    moon: "Full-Moon",
                    wind: "On-Shore",
                    temp: "22°",
                },
                {
                    day: "saturday",
                    date: "25.10.2020",
                    wave: "5ft - 6ft",
                    lTide: "17:30",
                    hTide: "5:30",
                    moon: "Full-Moon",
                    wind: "Off-Shore",
                    temp: "19°",
                },
                {
                    day: "sunday",
                    date: "26.10.2020",
                    wave: "2ft - 4ft",
                    lTide: "18:30",
                    hTide: "6:30",
                    moon: "Full-Moon",
                    wind: "On-Shore",
                    temp: "25°",
                },
            ],
        };
    },
    methods: {
        showNext() {
            this.$refs.carousel.next();
        },
        showPrev() {
            this.$refs.carousel.prev();
        },
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.forecast-slide {
    outline: none;
    overflow: hidden;
}

.slider_controll_container {
    margin-top: 2em;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;

    @include media(">=md") {
        margin-bottom: 2.5em;
    }

    .slider-text {
        font-size: $h3FontSize;
        font-weight: $headlineFontWeightBlack;
        font-family: $headlineFont;
        color: $headlineColor;
        text-transform: uppercase;
        margin: 0 3em;
    }
}

.forecast-day-flex {
    .single-day-container {
        padding: 2em;
        margin: 2em;
        background-image: url("../../assets/images/greenstart-bg.png");
        display: flex;
        flex-direction: column;
        gap: 0.8em;
        justify-content: center;
        text-align: center;
        border-radius: $borderRadius;
        box-shadow: $boxShadow;
        min-width: 15em;
        outline: none;
    }
}
</style>
