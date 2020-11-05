<template>
    <div>
        <LoginTemplate />
    </div>
</template>

<script>
import LoginTemplate from "../components/Templates/LoginTemplate.vue";

export default {
    name: "login",
    components: {
        LoginTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
