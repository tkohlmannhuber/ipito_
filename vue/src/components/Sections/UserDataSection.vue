<template>
    <div class="user-data-section-container">
        <div
            v-if="isEditMode"
            @click="isEditMode = false"
            class="close-container"
        >
            <div class="close"></div>
        </div>
        <EditUserData v-if="isEditMode" />
        <UserData v-if="!isEditMode" />
        <div class="user-data-btn-container">
            <button
                class="btn user-data-edit-btn"
                @click="isEditMode = true"
                v-if="!isEditMode"
            >
                <img src="../../assets/images/icons/pen.svg" alt="edit image" />
                <span>Edit</span>
            </button>
            <button
                class="btn user-data-delete-btn"
                v-if="userData.is_admin !== 1"
            >
                <img
                    src="../../assets/images/icons/delete.svg"
                    alt="delete image"
                />
                <span>Delete</span>
            </button>
        </div>
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";
import UserData from "../Partials/UserDashboard/UserData";
import EditUserData from "../Partials/UserDashboard/EditUserData";

export default {
    name: "userdatasection",
    components: {
        UserData,
        EditUserData,
    },
    data: () => {
        return {
            userData: "",
            isEditMode: false,
        };
    },

    methods: {},
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

.user-data-section-container {
    display: flex;
    flex-direction: column;
    background: white;
    padding: 3em;
    padding-top: 0;
    box-shadow: $boxShadow;
    border-radius: $borderRadius;
    align-items: center;
    gap: 3em;
    position: relative;
    .user-data-btn-container {
        display: flex;
        gap: 2em;
        .btn {
            display: flex;
            gap: 1em;
            padding: 0.6em 1.5em;
            border-radius: $borderRadius;
            border: none;
            box-shadow: $boxShadow;
            cursor: pointer;

            img {
                width: 1em;
            }
        }
    }

    .user-data-edit-btn {
        background: $tertiaryColor;
    }
    .user-data-delete-btn {
        background: $secondaryColor;
        color: white;
    }
    .close-container {
        position: absolute;
        background: $tertiaryColor;
        width: 3em;
        height: 3em;
        display: grid;
        place-items: center;
        border-radius: 100%;
        top: 0;
        right: 0;
        margin: 2em;
        cursor: pointer;
        &:hover {
            .close{
                transform: rotate(135deg);
            }
        }
        .close {
            position: relative;
            height: 2px;
            width: 1.5em;
            background: $primaryColor;
            transform: rotate(45deg);
            transition: all 0.5s;

            &::after {
                content: "";
                position: absolute;
                height: 2px;
                width: 1.5em;
                background: $primaryColor;
                transform: rotate(-90deg);
            }
        }
    }
}
</style>
