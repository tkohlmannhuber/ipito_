<template>
    <header class="dashboard-header">
        <nav>
            <div class="icon-btn-container">
                <router-link to="/">
                    <Logo class="dashboard-logo" />
                </router-link>
                <AccountNavList v-if="!isAdminRoute"/>
                <AdminNavList v-if="isAdminRoute"/>
            </div>
            <router-link to="/" class="dashboard-back-btn">
                Back
            </router-link>
        </nav>
    </header>
</template>

<script>
import Logo from "../Partials/Logo";
import AccountNavList from "../Partials/AccountNav/AccountNavList";
import AdminNavList from "../Partials/AdminNav/AdminNavList";

export default {
    name: "dashboardheader",
    components: {
        Logo,
        AccountNavList,
        AdminNavList,
    },
    data: () => {
        return {
            isAdminRoute: false,
        }
    },
    // watch: {
    //     $route() {
    //         if (this.$route.path == '/admin/dashboard') {
    //             this.isAdminRoute = true;
    //         } else{
    //             this.isAdminRoute = false;
    //         }
    //     },
    // },
    methods: {
        getRoute(){
            if (this.$route.path == '/admin/dashboard') {
                this.isAdminRoute = true;
            } else{
                this.isAdminRoute = false;
            }
        }
    },
    created(){
        this.getRoute();
        console.log(this.$route.path);
    }
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.dashboard-header {
    height: 100vh;
    background: white;
    position: fixed;
    box-shadow: $boxShadow;

    nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;

        .icon-btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon-btn-container > * + * {
            margin-top: 3em;
        }

        .dashboard-logo {
            padding: 2em;
        }

        .dashboard-back-btn {
            padding: 2em;
            color: $primaryColor;
            font-family: $headlineFont;
            text-transform: uppercase;
            font-weight: $headlineFontWeightBlack;
            font-size: 1.5em;
            transition: all .5s;
            &:hover{
                transform: scale(1.1);
            }
        }
    }
}
</style>
