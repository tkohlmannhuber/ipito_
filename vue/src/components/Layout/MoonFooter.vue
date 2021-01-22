<template>
    <footer>
        <div class="footer-text-flex footer-wrapper">
            <div class="dia-flex">
                <a href="#">Daten<span class="red">s</span>chutz</a>
                <a href="#">Im<span class="red">p</span>ressum</a>
                <a href="#">A<span class="red">g</span>bs</a>
            </div>
            <div>IPITO 20<span class="red">21</span></div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "moonfooter",
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

    .footer-text-flex {
        position: absolute;
        bottom: 0;
        font-family: $headlineFont;
        text-transform: uppercase;
        z-index: 1;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        color: rgba(white, .95);

        @include media(">=md") {
            flex-direction: row;
        }

        .dia-flex {
            display: flex;
            justify-content: space-between;

            a {
                color: rgba(white, 0.95);
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
                    background-color: $tertiaryColor;
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
