<template>
    <div class="home">
        <PrivacyPolicyTemplate />
    </div>
</template>

<script>
import PrivacyPolicyTemplate from "../components/Templates/PrivacyPolicyTemplate";

export default {
    name: "TermsOfCondition",
    components: {
        PrivacyPolicyTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
