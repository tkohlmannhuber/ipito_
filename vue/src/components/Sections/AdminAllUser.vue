<template>
    <div class="all-users-container" :key="componentKey">
        <h2 v-if="allUsers.length > 0">
            List of all U<span class="red">s</span>ers
        </h2>
        <div v-if="loading">
            <h3>Loading....</h3>
            <Loader />
        </div>
        <div v-if="allUsers.length < 1 && gotUsers" class="user-post-error">
            <h3>Somthing went wrong or there no Users right now!</h3>
        </div>
        <div class="user-container" v-if="gotUsers">
            <div class="single-user-label">
                <h4>Em<span class="red">a</span>il:</h4>
                <h4>U<span class="red">s</span>ername:</h4>
                <h4>Cr<span class="red">e</span>ated:</h4>
            </div>
            <div v-for="user in allUsers" :key="user.id" class="single-user">
                <div>
                    <p>{{ user.email }}</p>
                </div>
                <div>
                    <p>{{ user.username }}</p>
                </div>
                <div>
                    <p>{{ user.created_at | formatDate }}</p>
                </div>
                <button class="delete-btn" @click="deleteUser(user.id)">
                    Delete <i class="far fa-trash-alt"></i>
                </button>
            </div>
            <transition name="fade">
                <div v-if="deleteBox" class="delete-box">
                    <h3>
                        user deleted successfully!
                    </h3>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Loader from "../Partials/Loader";

export default {
    name: "adminalluser",
    components: {
        Loader,
    },

    data: () => {
        return {
            allUsers: "",
            loading: true,
            gotUsers: false,
            isAdmin: "",
            userId: null,
            componentKey: 0,
            deleteBox: false,
        };
    },

    methods: {
        getAllUser() {
            axios
                .get("https://api.ipito.surf/api/user/index", {
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "multipart/form-data",
                        Authorization:
                            "Bearer " + localStorage.getItem("token"),
                    },
                })
                .then((res) => {
                    this.allUsers = res.data;
                    this.loading = false;
                    this.gotUsers = true;
                })
                .catch(() => {
                    this.gotUsers = false;
                });
        },
        deleteUser(id) {
            axios
                .delete(`https://api.ipito.surf/api/user/${id}`)
                .then((res) => {
                    this.deleteBox = true;
                    this.allUsers = res.data;
                    setTimeout(() => {
                        this.deleteBox = false;
                    }, 6000);
                })
        },
    },

    created() {
        this.getAllUser();
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.all-users-container {
    border-radius: $borderRadius;
    background-image: url("../../assets/images/greenstart-bg.png");
    padding: 3em;
    box-shadow: $boxShadow;

    .user-container {
        display: flex;
        flex-direction: column;
        gap: 1em;
        width: 100%;
        padding: 3em 0;
        position: relative;

        .delete-box {
            display: grid;
            place-items: center;
            width: 100%;
            height: 100%;
            background: $tertiaryColorLight;
            padding: 1em;
            border-radius: $borderRadius;
        }

        .single-user-label {
            display: grid;
            width: 100%;
            grid-template-columns: repeat(4, 1fr);
            align-items: center;
            gap: 4em;
            padding-bottom: 1em;
        }

        .single-user {
            display: grid;
            width: 100%;
            grid-template-columns: repeat(4, 1fr);
            gap: 4em;

            .delete-btn {
                border: none;
                background: $secondaryColor;
                border-radius: $borderRadius;
                box-shadow: $boxShadow;
                padding: 0.8em;
                width: 7em;
                cursor: pointer;
                outline: none;
                transition: all 0.5s;
                &:hover {
                    transform: scale(1.1);
                }
            }
        }
    }
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
    transition: all 0.8s ease;
}
</style>
