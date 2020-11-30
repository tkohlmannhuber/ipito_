<template>
    <div>
        <DashboardTemplate />
    </div>
</template>

<script>
import DashboardTemplate from "../components/Templates/DashboardTemplate.vue";

export default {
    name: "login",
    components: {
        DashboardTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
