<template>
    <section class="forecast-container">
        <h3 class="forecast-text">7 <span class="red"> Day </span> Forecast</h3>
        <ForecastSingleDay />
    </section>
</template>

<script>
import ForecastSingleDay from "../Partials/ForecastSingleDay";

export default {
    name: "forecastsection",
    components: {
        ForecastSingleDay,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.forecast-container {
    padding: 2.5em 0;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    position: relative;
    overflow: hidden;

    &::after {
        content: "";
        position: absolute;
        top: 10em;
        left: 0;
        width: 10%;
        height: 80%;
        background: linear-gradient(
            270deg,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 50%,
            rgba(255, 255, 255, 1) 100%
        );
        z-index: 1;
    }
    @include media(">=xs") {
        &::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 10%;
            height: 110%;
            background: linear-gradient(
                270deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 1) 50%,
                rgba(255, 255, 255, 1) 100%
            );
            z-index: 1;
        }
    }
    &::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 10%;
        height: 110%;
        background: linear-gradient(
            90deg,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 50%,
            rgba(255, 255, 255, 1) 100%
        );
        z-index: 1;
    }

    .forecast-text {
        position: absolute;
        top: 50%;
        left: -3.5em;
        transform: rotate(-90deg);
        font-size: $h2FontSize;
        margin: 0;
        padding: 0;
        z-index: 10;

        @include media(">=sm") {
            left: -3em;
            top: 52%;
        }

        @include media('>=md'){
            top: 55%;
        }
    }
}
</style>
