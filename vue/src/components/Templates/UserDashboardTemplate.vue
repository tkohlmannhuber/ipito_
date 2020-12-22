<template>
    <div class="dashboard-template dashboard-wrapper">
        <div class="dashboard-headline-flex">
            <h1 class="dashboard-headline">User {{userData.username}}</h1>
            <div class="user-img-constainer">
                <img src="../../assets/images/avatar/avatar4.jpg" alt="user image">
            </div>
        </div>
        <UserDataSection />
        <UserPostSection />
	</div>
</template>

<script>
import userDataService from "@/services/userDataService";
import UserDataSection from '../Sections/UserDataSection.vue';
import UserPostSection from '../Sections/UserPostSection.vue';

export default {
    name: "userdashboardtemplate",
    components: {UserDataSection,
    UserPostSection},
    data: () => {
        return {
            userData: '',
            showPosts: false,
        }
    },

    created(){
        userDataService.me().then((userData) => {
                this.userData = userData;
                console.log(this.userData)
            });
}
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.dashboard-template{
    background-image: url("../../assets/images/greenstart-bg.png");
    background-repeat: no-repeat;
    background-size: cover;
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 3em;
    .dashboard-headline-flex{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        .user-img-constainer{
            img {
                width: 4em;
                height: 4em;
                object-fit: cover;
                border-radius: 100%;
                margin-left: 1em;
            }
        }
    }

}
</style>
