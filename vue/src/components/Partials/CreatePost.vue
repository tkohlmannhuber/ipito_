<template>
    <form action="#" class="create-post-container">
        <CreatePostDragAndDrop />
        <h2>Create <span class="red">A</span> Post</h2>
        <CreatePostForm />
    </form>
</template>

<script>
import CreatePostDragAndDrop from "./CreatePostDragAndDrop";
import CreatePostForm from "./CreatePostForm";

export default {
    name: "createpost",
    components: {
        CreatePostDragAndDrop,
        CreatePostForm,
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";


.create-post-container {
    padding: 2em;
    background-image: url("../../assets/images/greenstart-bg.png");
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;

    @include media(">=xs"){
        padding: 6em;
    }

    @include media(">=lg"){
        flex-direction: row;
        padding: 2em;
    }

    h2 {
        margin: 1em 0;
        padding: 0;
        @include media(">=lg"){
            transform: rotate(-90deg);
        }
    }
}



</style>
