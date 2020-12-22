<template>
    <header class="dashboard-header">
        <nav>
            <div class="icon-btn-container">
                <router-link to="/">
                    <Logo class="dashboard-logo" />
                </router-link>
                <AccountNavList />
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

export default {
    name: "DashboardHeader",
    components: {
        Logo,
        AccountNavList,
    },
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

        .icon-btn-container{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3em;
        }
        .dashboard-logo {
            padding: 2em;
        }

        .dashboard-back-btn {
            padding: 2em;
        }
    }
}
</style>
