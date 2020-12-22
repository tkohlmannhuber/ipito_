<template>
    <form action="#" class="user-data-container">

        <div class="user-img-container">
            <img
                src="../../../assets/images/avatar/avatar4.jpg"
                alt="user image"
            />
        </div>
        <div class="user-data-flex">
            <label for="username" class="user-data-key">Username:</label>
            <input class="user-data-value" id="username" type="text" :placeholder="userData.username" v-model="newUserData.username"/>
        </div>
        <div class="user-data-flex">
            <label for="email" class="user-data-key">Email:</label>
            <input class="user-data-value" type="email" name="email" id="email" :placeholder="userData.email" v-model="newUserData.email"/>
        </div>
        <div class="user-data-flex">
            <label for="password" class="user-data-key">Password</label>
            <input class="user-data-value" type="password" name="password" id="password" placeholder="********" v-model="newUserData.password"/>
        </div>
        <div class="user-data-flex">
            <label for="password-rp" class="user-data-key"
                >Password repeat:</label
            >
            <input class="user-data-value" type="password" name="password-rp" id="password-rp" placeholder="********" v-model="newUserData.passsword_confirmation"/>
        </div>

        <button class="btn" type="submit" @click.prevent="editUser()">
            <img
                src="@/assets/images/icons/submit_icon.svg"
                alt="paper plane"
            />
            Submit
        </button>
    </form>
</template>

<script>
import userDataService from "@/services/userDataService";
import axiosClient from '@/services/axiosClient';

export default {
    name: "edituserdata",
    data: () => {
        return {
            userData: "",
            newUserData:{
                username: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
            userId:''

        };
    },

    methods: {
        editUser(){
            const url = '/user/';

            axiosClient().put(url, this.newUserData).then(() => {
                console.log('user updated')
            })
        }
    },
    created() {
        userDataService.me().then((userData) => {
            this.userData = userData;
            this.userId = userData.id;
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

    .btn {
        display: flex;
        gap: 1em;
        padding: 0.6em 1.5em;
        border-radius: $borderRadius;
        border: none;
        box-shadow: $boxShadow;
        cursor: pointer;
        background: $tertiaryColor;
        color: $primaryColor;

        img {
            width: 1em;
        }
        
    }

    .user-img-container {
        width: 10em;
        height: 10em;
        border-radius: 100%;
        overflow: hidden;
        padding-bottom: 3em;

        img {
            object-fit: cover;
            width: 100%;
        }
    }

    .user-data-flex {
        display: flex;
        justify-content: space-between;
        width: 100%;
        gap: 4em;
        align-items: center;

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
            padding:.5rem 1rem;
            border:none;
            border-bottom: 1px solid $primaryColor;
            outline: none;
        }
    }
}
</style>
