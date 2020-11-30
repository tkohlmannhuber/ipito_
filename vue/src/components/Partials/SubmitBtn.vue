<template>
    <button type="submit" @click.prevent="method">
        {{ text }}
    </button>
</template>

<script>
export default {
    name: "submitbtn",
    props: {
        text: String,
        method: {
            type: Function,
        }
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

button {
    background: $tertiaryColor;
    border: none;
    border-radius: $borderRadius;
    padding: 0.5em 2em;
    font-family: $headlineFont;
    text-transform: uppercase;
    box-shadow: $boxShadow;
    font-size: $textFontSize;
    transition: all .5s; 

    @include media(">=md"){
        cursor: pointer;
        &:hover{
            transform: scale(1.1);
        }
    }
}
</style>
