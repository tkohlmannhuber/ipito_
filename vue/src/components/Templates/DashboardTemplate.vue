<template>
    <div class="dashboard-template">
		
	</div>
</template>

<script>
import userDataService from "@/services/userDataService";

export default {
    name: "logintemplate",
    components: {},
    data: () => {
        return {
            userData: null,
        }
    },

    created(){
        userDataService.me().then((userData) => {
                this.userData = userData;
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
}
</style>
