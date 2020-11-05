<template>
    <div class="home">

        <HomeTemplate />
    </div>
</template>

<script>
// @ is an alias to /src
import HomeTemplate from "../components/Templates/HomeTemplate";

export default {
    name: "Home",
    components: {
        HomeTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
