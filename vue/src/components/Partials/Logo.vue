<template>
    <div>
        <img v-if="!whiteLogo"
            class="logo"
            src="../../assets/images/logo_bright.svg"
            alt="Logo"
        />
        <img v-if="whiteLogo"
            class="logo"
            src="../../assets/images/logo_dark.svg"
            alt="Logo"
        />
        <p :class="{logoTextWhite: whiteLogo}" class="logo-text">I<span class="red logo_text">p</span>ito</p>
    </div>
</template>

<script>
export default {
    name: "logo",
    data: () => {
        return {
            whiteLogo: false,
        };
    },
    watch: {
        $route() {
            if (this.$route.path === "/moon") {
                this.whiteLogo = true;
            } else {
                this.whiteLogo = false;
            }
        },
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

div {
    display: flex;
    align-items: center;

    p {
        margin-left: 1em;
        font-size: $logoFontSize;
        font-family: $headlineFont;
        font-weight: $headlineFontWeightBlack;
        color: $headlineColor;
        text-transform: uppercase;
    }
}

.logoTextWhite{
    color: white;
}
</style>
