<template>
    <div class="home">
        <TermsOfConditionTemplate />
    </div>
</template>

<script>
import TermsOfConditionTemplate from "../components/Templates/TermsOfConditionTemplate";

export default {
    name: "TermsOfCondition",
    components: {
        TermsOfConditionTemplate,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
