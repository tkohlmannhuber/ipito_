<template>
    <div class="teaser_card_container">
        <h3>Ericeira</h3>
        <p>
            Sand bottom jumbled shorebreak send it monsters. Wave kook in da wa
            spit Nat Young, hollow pose on the
        </p>
        <span class="coordinates">38° 58′ N , 9° 25′ Wv</span>
        <span class="wave">Wave Alert</span>
        <div class="info-container">
            <div class="info-item">
                <button class="wave-btn">
                    <img src="@/assets/images/icons/wave.svg" alt="wave icon" />
                </button>
                <div class="btn-text">{{ weatherData.swellHeight.icon }}ft</div>
            </div>

            <div class="info-item">
                <button class="wave-btn">
                    <img src="@/assets/images/icons/temp.svg" alt="wave icon" />
                </button>
                <div class="btn-text">{{ waterTemp }}° Water</div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "teasercard",
    data: () => {
        return {
            weatherData: "",
            waterTemp: '',
        };
    },

    methods: {
        getWeather() {
            const params = "waterTemperature,windSpeed,swellHeight";
            const lat = 38.988218;
            const lng = -9.421071;

            let utcDate = new Date();
            let startTime = Math.floor(utcDate.getTime() / 1000);

            axios
                .get(
                    `https://api.stormglass.io/v2/weather/point?lat=${lat}&lng=${lng}&params=${params}&start=${startTime}&end=${startTime}`,
                    {
                        headers: {
                            Authorization:
                                "7383fd56-0a18-11eb-b19c-0242ac130002-7383fe0a-0a18-11eb-b19c-0242ac130002",
                        },
                    }
                )
                .then((response) => {
                    this.weatherData = response.data.hours[0];
                    let temp = this.weatherData.waterTemperature.sg;
                    const waterTemp = Math.ceil(temp);
                    this.waterTemp = waterTemp;
                })
                .catch(() => {
                });
        },
    },
    created(){
        this.getWeather();
    }

};

</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.teaser_card_container {
    margin: 1em 0 5em;
    padding: 2em;
    padding-right: 2.5em;
    padding-bottom: 0em;
    width: 40ch;
    box-shadow: 0px 6px 50px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    background: white;
    position: relative;

    @include media(">=xs") {
        width: 60ch;
    }

    @include media(">=md") {
        width: 40ch;
        position: absolute;
        right: 10%;
        top: 15%;
    }

    @include media(">=xl") {
        right: 30%;
    }

    .coordinates {
        position: absolute;
        top: 45%;
        right: -45px;
        transform: rotate(-90deg);
    }
    .wave {
        position: absolute;
        top: -2em;
        right: 3em;
        transform: rotate(0deg);
        color: $secondaryColor;
        font-weight: $textFontWeight;
        text-transform: uppercase;
        font-family: $headlineFont;
    }

    button {
        width: 3em;
        height: 3em;
        border: none;
        border-radius: 50%;
        background: $tertiaryColor;
    }

    .btn-text {
        position: absolute;
        right: 0;
        display: flex;
        font-family: $textFont;
        font-weight: $textFontWeight;
        white-space: nowrap;
        transform: translate(100%, 1.5em) rotate(45deg);
        transform-origin: left center;
    }
}

.info-container {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    margin-right: 1em;
    transform: translateY(1.5em);

    .info-item {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 2em;
    }
}
</style>
