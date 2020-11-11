<template>
    <div class="post_list_container">
        <Post class="post_list" />
    </div>
</template>

<script>
import Post from "./Post";

export default {
    name: "postlist",
    components: {
        Post,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.post_list_container {
    .post_list {
        display: flex;
        padding: 4em 0;
        gap: 5em;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
}
</style>
