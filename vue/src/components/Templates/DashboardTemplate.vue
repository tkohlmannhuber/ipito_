<template>
    <div class="dashboard-template">
		hallo
	</div>
</template>

<script>
import axios from 'axios';
export default {
    name: "logintemplate",
    components: {},

    data: () => {
        return {
            user: null,
        };
	},
	
	mounted(){
		axios.get('http://ipito_api.local/api/user').then((res) => {
			this.user = res.data;
		})
	}
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";
</style>
