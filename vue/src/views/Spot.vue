<template>
    <div class="spot">
        <SpotTemplate />
    </div>
</template>

<script>
// @ is an alias to /src
// import TestTemplate from '../components/Templates/TestTemplate'
import SpotTemplate from "../components/Templates/SpotTemplate";

export default {
    name: "Home",
    components: {
        SpotTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
