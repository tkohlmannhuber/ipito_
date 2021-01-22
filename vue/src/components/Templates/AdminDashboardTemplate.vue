<template>
    <div class="dashboard-template dashboard-wrapper">
        <div class="dashboard-headline-flex">
            <h1 class="dashboard-headline">
                Admin <span class="red">{{ userData.username }}</span>
            </h1>
            <div class="user-img-constainer" v-if="userData.image_path != null">
                <img
                    class="user-image"
                    :src="
                        'https://api.ipito.surf/storage/images/' +
                            userData.image_path
                    "
                    alt="user image"
                />
            </div>
            <div class="user-img-constainer" v-if="userData.image_path == null">
                <img v-if="userData.image_path == null" src="@/assets/images/icons/user.svg" alt="user image" />
                <img v-if="userData.image_path != null"
                    :src="
                        'https://api.ipito.surf/storage/images/' +
                            userData.image_path
                    "
                    alt="user image"
                />
            </div>
        </div>
        <AdminAllUser />
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";
import AdminAllUser from "../Sections/AdminAllUser";

export default {
    name: "admindashboardtemplate",
    components: { AdminAllUser },
    data: () => {
        return {
            userData: "",
        };
    },
    watch: {
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
    width: 100vw;
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
