<template>
    <div class="user-data-container">
        <div class="loading-container" v-if="loading">
            <h3>Loading...</h3>
            <Loader />
        </div>
        <div class="data-container" v-if="!loading">
            <div class="user-img-container" v-if="userData.image_path != null">
                <img
                    class="user-image"
                    :src="
                        'http://api.ipito.local/storage/images/' +
                            userData.image_path
                    "
                    alt="user image"
                />
            </div>
            <div class="user-img-container" v-if="userData.image_path == null">
                <img src="@/assets/images/icons/user.svg" alt="user image" />
            </div>
            <div class="user-data-flex">
                <span class="user-data-key">Username:</span>
                <span class="user-data-value">{{ userData.username }}</span>
            </div>
            <div class="user-data-flex">
                <span class="user-data-key">Email:</span>
                <span class="user-data-value">{{ userData.email }}</span>
            </div>
            <div class="user-data-flex">
                <span class="user-data-key">Posts:</span>
                <span class="user-data-value">20 Posts </span>
            </div>
        </div>
        <div class="user-data-btn-container" v-if="!loading">
            <!-- <button
                class="btn user-data-edit-btn"
                @click="isEditMode = true"
                v-if="!isEditMode"
            >
                <img src="../../assets/images/icons/pen.svg" alt="edit image" />
                <span>Edit</span>
            </button> -->
            <router-link
                :to="{ name: 'Account', params: { id: 'edit' } }"
                class="user-data-edit-btn btn"
            >
                Edit
            </router-link>
        </div>
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";
import Loader from "../Partials/Loader";

export default {
    name: "userdatasection",
    components: {
        Loader,
    },
    data: () => {
        return {
            userData: "",
            loading: true,
        };
    },

    methods: {},
    created() {
        userDataService.me().then((userData) => {
            this.userData = userData;
            this.loading = false;
        });
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.user-data-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: white;
    padding: 3em;
    padding-top: 0;
    box-shadow: $boxShadow;
    border-radius: $borderRadius;
    align-items: center;
    gap: 3em;
    position: relative;

    .data-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 2em;
        gap: 3em;
        .user-img-container {
            width: 7em;
            height: 7em;
            border-radius: 100%;
            overflow: hidden;
            background: $tertiaryColorLight;
            display: grid;
            place-items: center;
            box-shadow: $boxShadow;

            img {
                object-fit: cover;
                width: 3em;
            }
            .user-image {
                object-fit: cover;
                width: 100%;
            }
        }

        .user-data-flex {
            display: flex;
            justify-content: space-between;
            width: 100%;
            gap: 4em;

            .user-data-key {
                font-family: $headlineFont;
                text-transform: uppercase;
                color: $headlineColor;
                font-weight: $headlineFontWeightBlack;
                font-size: $h3FontSize;
            }

            .user-data-value {
                font-family: $textFont;
                color: $headlineColor;
                font-weight: $textFontWeight;
                font-size: $h3FontSize;
            }
        }
    }

    .loading-container {
        padding: 2em;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .user-data-btn-container {
        display: flex;
        gap: 2em;
    }

    .user-data-edit-btn {
        background: $tertiaryColor;
        transition: all 0.5s;
        padding: 0.6em 1.5em;
        font-weight: $textFontWeight;
        font-size: 1em;
        border-radius: $borderRadius;

        &:hover {
            transform: scale(1.1);
        }
    }
}
</style>
