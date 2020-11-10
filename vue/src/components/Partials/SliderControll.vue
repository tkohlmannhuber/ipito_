<template>
    <div class="slider_controll_container">
        <SliderBtnPrev />
        <span class="slider-text">{{ text }}</span>
        <SliderBtnNext />
    </div>
</template>

<script>
import SliderBtnNext from "./SliderBtnNext";
import SliderBtnPrev from "./SliderBtnPrev";

export default {
    name: "slidercontroll",
    components: {
        SliderBtnNext,
        SliderBtnPrev,
    },
    props: {
        text: String,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.slider_controll_container {
    margin-bottom: 4em;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: auto;
    margin-right: auto;

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
</style>
