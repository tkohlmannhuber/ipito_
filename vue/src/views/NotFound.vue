<template>
    <div class="not-found-container">
        <h1 class="">404 Page Not Found!</h1>
    </div>
</template>

<script>
// @ is an alias to /src

export default {
    name: "NotFound",
    components: {},
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.not-found-container {
    display: grid;
    height: 100vh;
    width: 100%;
    place-items: center;
    background-image: url("../assets/images/greenstart-bg.png");

    h1 {
        box-shadow: $boxShadow;
        padding: 1em;
        border-radius: $borderRadius;
        background: white;
    }
}
</style>
