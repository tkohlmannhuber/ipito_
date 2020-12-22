<template>
    <div>
        <UserDashboardTemplate />
    </div>
</template>

<script>
import UserDashboardTemplate from "../components/Templates/UserDashboardTemplate.vue";

export default {
    name: "login",
    components: {
        UserDashboardTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
