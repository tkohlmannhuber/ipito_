<template>
    <div class="auth-start-flex">
        <h3>Join <span class="red">the</span> community</h3>
        <p>Stay always up to date!</p>
        <TextBtn text="Login here" />
        <TextBtn text="Sign in here" />
    </div>
</template>

<script>

import TextBtn from "../Partials/TextBtn";

export default {
    name: "chooselogin",
    components: {
      TextBtn,
    }
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
