<template>
    <div class="moon-img-container">
        <img src="../../assets/images/moon.png" alt="Moon Image" />
        <div class="phase-container">
            <div class="phase">
                <div class="phase-text"><span class="red">Waxing</span> Crescent</div>
            </div>
            <div class="phase">
                <div class="phase-text">First <span class="red">Quater</span></div>
            </div>
            <div class="phase">
                <div class="phase-text"><span class="red">Full</span> Moon</div>
            </div>
            <div class="phase">
                <div class="phase-text">Last <span class="red">Quater</span></div>
            </div>
            <div class="phase">
                <div class="phase-text"><span class="red">Waning</span> Crescent</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "moonbg",
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.moon-img-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    bottom: 0;
    width: 50vw;
    margin-top: 5em;

    img {
        width: 100%;
    }

    &::after {
        content: "";
        position: absolute;
        width: 110%;
        height: 110%;
        border: 1px solid $tertiaryColor;
        border-radius: 50%;
    }

    .phase-container {
        position: absolute;
        width: 110%;
        .phase {
            width: 100%;
            position: absolute;
            font-family: $headlineFont;
            font-size: $h3FontSize;
            color: white;
            text-transform: uppercase;
            z-index: 1;
        }
        .phase:nth-child(1) {
            transform: translateY(-50%) rotate(30deg);
            .phase-text:nth-child(1) {
                transform: translate(-106%, -20%) rotate(-30deg);
                transform-origin: right center;
            }
        }
        .phase:nth-child(2) {
            transform: translateY(-50%) rotate(60deg);
            .phase-text {
                transform: translate(-115%, -30%) rotate(-60deg);
                transform-origin: right center;
            }
        }
        .phase:nth-child(3) {
            transform: translateY(-50%) rotate(90deg);
            .phase-text {
                transform: translate(-70%, 0%) rotate(-90deg);
                transform-origin: center center;
            }
        }
        .phase:nth-child(4) {
            transform: translateY(-50%) rotate(120deg);
            .phase-text {
                transform: translate(-90%, -170%) rotate(-120deg);
            }
        }
        .phase:nth-child(5) {
            transform: translateY(-50%) rotate(150deg);
            .phase-text {
                transform: translate(-100%, -150%) rotate(-150deg);
            }
        }
    }

    .phase-text {
        display: inline-block;
    }
}
</style>
