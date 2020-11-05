<template>
    <div>
        <MoonTemplate />
    </div>
</template>

<script>
import MoonTemplate from "../components/Templates/MoonTemplate.vue";

export default {
    name: "login",
    components: {
        MoonTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";


</style>
