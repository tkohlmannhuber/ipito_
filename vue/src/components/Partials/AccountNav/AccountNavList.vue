<template>
    <div class="nav-flex">
        <button class="btn"><img src="@/assets/images/icons/user.svg" alt="user icon"></button>
        <button class="btn"><img src="@/assets/images/icons/posts.svg" alt="post icon"></button>
    </div>
</template>

<script>
export default {
    name: "AccountNavList",
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.nav-flex{
    display: flex;
    flex-direction: column;
    gap: 3em;

    .btn{
        width: 4em;
        height: 4em;
        border-radius: 100%;
        border: none;
        background: $tertiaryColor;
        box-shadow: $boxShadow;
        display: grid;
        place-items: center;
        cursor: pointer;
        transition: all .5s;
        outline:none;

        img{
            width: 2em;
            padding: 0;
        }

        &:hover{
            transform: scale(1.1);
        }

    }
}
</style>
