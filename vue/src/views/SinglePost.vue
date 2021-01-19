<template>
    <div class="single-post">
        <SinglePostTemplate />
    </div>
</template>

<script>
import SinglePostTemplate from "../components/Templates/SinglePostTemplate.vue";
export default {
    name: "singlepost",
    components: {
        SinglePostTemplate
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.single-post{
    height: 100vh;
    width: 100vw;
    display: grid;
    place-items: center;
}

</style>
