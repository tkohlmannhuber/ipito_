<template>
    <div>
        <transition name="fade">
            <div v-if="!isAdmin" class="admin-error-container">
                <div class="admin-error-content">
                    <h1>Sorry you are <span class="red">no</span> Admin!</h1>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <AdminDashboardTemplate v-if="isAdmin" />
        </transition>
    </div>
</template>

<script>
import AdminDashboardTemplate from "../components/Templates/AdminDashboardTemplate.vue";
import userDataService from "@/services/userDataService";

export default {
    name: "admindashboard",
    components: {
        AdminDashboardTemplate,
    },
    data: () => {
        return {
            userData: "",
            isAdmin: true,
        };
    },
    created() {
        userDataService.me().then((userData) => {
            this.userData = userData;
            if (this.userData.is_admin) {
                this.isAdmin = true;
            } else {
                this.isAdmin = false;
                setTimeout(() => {
                    window.location.href = "/";
                }, 3000);
            }
        });
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.admin-error-container {
    position: absolute;
    width: 100%;
    height: 100vh;
    background: rgba(grey, 0.6);
    z-index: 1;
    display: grid;
    place-items: center;
    .admin-error-content {
        display: flex;
        background: white;
        border-radius: $borderRadius;
        padding: 2em;
        box-shadow: $boxShadow;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
