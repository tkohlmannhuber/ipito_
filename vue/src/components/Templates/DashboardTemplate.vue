<template>
    <div class="dashboard-template">
		
	</div>
</template>

<script>
import axios from 'axios';
export default {
    name: "logintemplate",
    components: {},

    methods: {
        getLoggedInUser(){
            axios.get("http://api.ipito.local/api/user").then((res) => {
                console.log(res.data);
            })
        }
    },

    created(){
        this.getLoggedInUser();
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
