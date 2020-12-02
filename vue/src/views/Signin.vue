<template>
    <div>
        <SigninTemplate />
    </div>
</template>

<script>
import SigninTemplate from "../components/Templates/SigninTemplate.vue";

export default {
    name: "login",
    components: {
        SigninTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
