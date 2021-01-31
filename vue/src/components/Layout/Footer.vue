<template>
    <footer>
        <video autoplay muted loop class="footer_video">
            <source src="../../assets/images/yoooo.mp4" type="video/mp4" />
        </video>
        <div class="footer-text-flex footer-wrapper">
            <div class="dia-flex">
                <router-link :to="{name: 'TermsOfCondition' }" >Terms Of Condition</router-link>
                <router-link :to="{name: 'PrivacyPolicy' }" >Privacy Policy</router-link>
            </div>
            <div>IP<span class="red">I</span>TO 2021</div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
    components: {},
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

footer {
    width: 100%;
    position: relative;

    &::after {
        content: "";
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background: linear-gradient(
            180deg,
            rgba(255, 255, 255, 0.49763655462184875) 0%,
            rgba(255, 255, 255, 0.500437675070028) 100%
        );
    }

    .footer_video {
        width: 100%;
        display: block;
        height: 60vh;
        object-fit: cover;

        @include media(">=md") {
            height: 100%;
        }
    }

    .footer-text-flex {
        position: absolute;
        bottom: 0;
        font-family: $headlineFont;
        font-weight: $headlineFontWeightBlack;
        text-transform: uppercase;
        z-index: 1;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;

        @include media(">=md") {
            flex-direction: row;
        }

        .dia-flex {
            display: flex;
            justify-content: space-between;

            a {
                color: $textColor;
                margin: 1em;
                cursor: pointer;
                position: relative;

                &::before {
                    z-index: 1;
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 0.1em;
                    bottom: 0;
                    left: 0;
                    background-color: $primaryColor;
                    visibility: hidden;
                    transform: scaleX(0);
                    transition: all 0.3s ease-in-out 0s;
                }
                &:hover::before {
                    visibility: visible;
                    transform: scaleX(1);
                }
            }
        }
    }
}
</style>
