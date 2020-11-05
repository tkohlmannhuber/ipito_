<template>
    <div>
        <MoonHeroSection />
        <MoonDetailSection />
        <MoonFooter />
    </div>
</template>

<script>
import MoonHeroSection from "../Sections/MoonHeroSection";
import MoonDetailSection from "../Sections/MoonDetailSection";
import MoonFooter from "../Layout/MoonFooter";

export default {
    name: "moontemplate",
    components: {
        MoonHeroSection,
        MoonDetailSection,
        MoonFooter,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
