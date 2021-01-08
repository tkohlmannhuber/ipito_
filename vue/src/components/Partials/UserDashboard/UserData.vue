<template>
    <div class="user-data-container">
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
</template>

<script>
import userDataService from "@/services/userDataService";

export default {
    name: "userdata",
    data: () => {
        return {
            userData: "",
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

.user-data-container {
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
</style>
