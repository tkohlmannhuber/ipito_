<template>
    <div class="dashboard-template dashboard-wrapper">
        <div class="dashboard-headline-flex">
            <h1 class="dashboard-headline">
                User <span class="red">{{ userData.username }}</span>
            </h1>
            <div class="user-img-constainer" v-if="userData.image_path != null">
                <img
                    class="user-image"
                    :src="
                        'http://api.ipito.local/storage/images/' +
                            userData.image_path
                    "
                    alt="user image"
                />
            </div>
            <div class="user-img-constainer" v-if="userData.image_path == null">
                <img
                    v-if="userData.image_path == null"
                    src="@/assets/images/icons/user.svg"
                    alt="user image"
                />
                <img
                    v-if="userData.image_path != null"
                    :src="
                        'http://api.ipito.local/storage/images/' +
                            userData.image_path
                    "
                    alt="user image"
                />
            </div>
        </div>
        <UserDataSection v-if="showData" />
        <UserPostSection v-if="showPosts" />
        <UserEditSection v-if="showEdit" />
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";
import UserDataSection from "../Sections/UserDataSection.vue";
import UserPostSection from "../Sections/UserPostSection.vue";
import UserEditSection from "../Sections/UserEditSection.vue";

export default {
    name: "userdashboardtemplate",
    components: { UserDataSection, UserPostSection, UserEditSection },
    data: () => {
        return {
            userData: "",
            showPosts: false,
            showData: true,
            showEdit: false,
        };
    },
    watch: {
        $route() {
            if (this.$route.path === "/account/posts") {
                this.showPosts = true;
                this.showEdit = false;
                this.showData = false;
            } else if (this.$route.path === "/account/dashboard") {
                this.showData = true;
                this.showEdit = false;
                this.showPosts = false;
            } else if (this.$route.path === "/account/edit") {
                this.showEdit = true;
                this.showPosts = false;
                this.showData = false;
            }
        },
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

.dashboard-template {
    width: 100%;
    min-height: 100vh;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 3em;
    .dashboard-headline-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        .user-img-constainer {
            width: 4em;
            height: 4em;
            border-radius: 100%;
            margin-left: 1em;
            display: grid;
            place-items: center;
            background: $tertiaryColorLight;
            box-shadow: $boxShadow;
            overflow: hidden;

            img {
                object-fit: cover;
                width: 2em;
            }
            .user-image {
                object-fit: cover;
                width: 100%;
            }
        }
    }
}
</style>
