<template>
    <div class="nav-flex">
        <router-link
            class="btn"
            :to="{ name: 'Account', params: { id: 'dashboard' } }"
            ><img src="@/assets/images/icons/user.svg" alt="user icon" />
        </router-link>
        <router-link
            class="btn"
            :to="{ name: 'Account', params: { id: 'posts'} }"
            ><img src="@/assets/images/icons/posts.svg" alt="post icon" />
        </router-link>
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";

export default {
    name: "accountnavlist",
    data: () => {
        return {
            userData: "",
        };
    },

    created() {
        userDataService.me().then((userData) => {
            this.userData = userData;
        });
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.nav-flex {
    display: flex;
    flex-direction: column;
    gap: 3em;

    .btn {
        width: 4em;
        height: 4em;
        border-radius: 100%;
        border: none;
        background: $tertiaryColor;
        box-shadow: $boxShadow;
        display: grid;
        place-items: center;
        cursor: pointer;
        transition: all 0.5s;
        outline: none;

        img {
            width: 2em;
            padding: 0;
        }

        &:hover {
            transform: scale(1.1);
        }
    }
}
</style>
