<template>
    <div class="user-edit-container">
        <div v-if="loading" class="loading-container">
            <h3>Loading....</h3>
            <Loader />
        </div>

        <form
            v-if="!userUpdated && !loading"
            action="#"
            class="user-data-container"
            enctype="multipart/form-data"
        >
            <label
                for="file-input"
                class="user-img-container image-upload-label"
            >
                <img
                    v-if="userData.image_path == null"
                    src="@/assets/images/icons/user.svg"
                    alt="user image"
                />
                <img
                    v-if="userData.image_path != null"
                    class="user-image"
                    :src="
                        'https://api.ipito.surf/storage/images/' +
                            userData.image_path
                    "
                    alt="user image"
                />
                <input
                    type="file"
                    class="file-input"
                    id="file-input"
                    @change="onImageSelected"
                />
            </label>

            <p v-if="newUserData.image_path != null">
                <span class="img-name-label">Selected Image: </span>
                {{ newUserData.image_path.name }}
            </p>

            <div class="user-data-flex">
                <label for="username" class="user-data-key">Username:</label>
                <input
                    class="user-data-value"
                    id="username"
                    type="text"
                    :placeholder="userData.username"
                    v-model="newUserData.username"
                />
            </div>

            <div class="user-data-flex">
                <label for="email" class="user-data-key">Email:</label>
                <input
                    class="user-data-value"
                    type="email"
                    name="email"
                    id="email"
                    :placeholder="userData.email"
                    v-model="newUserData.email"
                />
            </div>

            <div class="user-data-flex">
                <label for="password" class="user-data-key">Password</label>
                <input
                    class="user-data-value"
                    type="password"
                    name="password"
                    id="password"
                    placeholder="********"
                    v-model="newUserData.password"
                />
            </div>

            <div class="user-data-flex">
                <label for="password-rp" class="user-data-key"
                    >Password repeat:</label
                >
                <input
                    class="user-data-value"
                    type="password"
                    name="password-rp"
                    id="password-rp"
                    placeholder="********"
                    v-model="newUserData.password_confirmation"
                />
            </div>

            <button class="submit-btn" type="submit" @click.prevent="editUser()">
                <img
                    src="@/assets/images/icons/submit_icon.svg"
                    alt="paper plane"
                />
                Submit
            </button>
        </form>
        <div class="user-edit-success" v-if="userUpdated">
            <h2>User Successfully Updated!</h2>
        </div>
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";
import axios from "axios";
import Loader from "../Partials/Loader";


export default {
    name: "usereditsection",
    components: {
      Loader,
    },

    data: () => {
        return {
            userData: "",
            newUserData: {
                username: "",
                email: "",
                password: "",
                password_confirmation: "",
                image_path: null,
            },
            userId: "",
            userUpdated: false,
            loading: true,
        };
    },

    methods: {
        onImageSelected(event) {
            this.newUserData.image_path = event.target.files[0];
        },

        editUser() {
            // const url = "/user/";
            let formData = new FormData();
            formData.append("username", this.newUserData.username);
            formData.append("email", this.newUserData.email);
            formData.append("password", this.newUserData.password);
            formData.append(
                "password_confirmation",
                this.newUserData.password_confirmation
            );
            formData.append("image_path", this.newUserData.image_path);
            formData.append("_method", "PUT");

            axios
                .post("https://api.ipito.surf/api/user", formData, {
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "multipart/form-data",
                        Authorization:
                            "Bearer " + localStorage.getItem("token"),
                    },
                })
                .then(() => {
                    this.userUpdated = true;
                });
        },
    },
    created() {
        userDataService.me().then((userData) => {
            this.userData = userData;
            this.userId = userData.id;
            this.loading = false;
        });
    },
    updated() {},
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";


.user-edit-container{
  background: white;
  padding: 2em;
  box-shadow: $boxShadow;
  border-radius: $borderRadius;
  display: flex; 
  align-items: center; 
  justify-content: center;

  .user-data-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 2em;
      gap: 3em;
  
      .img-name-label {
          font-family: $headlineFont;
          text-transform: uppercase;
          color: $headlineColor;
          font-weight: $headlineFontWeightBlack;
          font-size: $h4FontSize;
      }
  
      .submit-btn {
          display: flex;
          gap: 1em;
          padding: 0.6em 1.5em;
          border-radius: $borderRadius;
          border: none;
          box-shadow: $boxShadow;
          cursor: pointer;
          background: $tertiaryColor;
          color: $primaryColor;
          transition: all .5s;
  
          img {
              width: 1em;
          }
          &:hover{
              transform: scale(1.1);
          }
      }
  
      .image-upload-label {
          cursor: pointer;
          transition: all 0.5s;
  
          &:hover {
              transform: scale(1.1);
          }
          .file-input {
              position: absolute;
              z-index: -1;
              opacity: 0;
          }
      }
  
      .user-img-container {
          width: 5em;
          height: 5em;
          border-radius: 100%;
          overflow: hidden;
          display: grid;
          place-items: center;
          background: $tertiaryColorLight;
          box-shadow: $boxShadow;
          position: relative;
  
          &::after {
              position: absolute;
              content: "";
              width: 100%;
              height: 100%;
              background: transparent;
              transition: all 0.5s;
          }
  
          &:hover {
              &::after {
                  background: rgba(black, .5);
              }
          }
  
          @include media(">=md") {
              width: 7em;
              height: 7em;
          }
  
          img {
              object-fit: cover;
              width: 2.5em;
              @include media(">=md") {
                  width: 3.5em;
              }
          }
          .user-image {
              object-fit: cover;
              width: 100%;
          }
      }
  
      .user-data-flex {
          display: flex;
          flex-direction: column;
          align-items: flex-start;
          width: 100%;
          gap: 2em;
          @include media(">=md") {
              flex-direction: row;
              justify-content: space-between;
              gap: 4em;
          }
  
          .user-data-key {
              font-family: $headlineFont;
              text-transform: uppercase;
              color: $headlineColor;
              font-weight: $headlineFontWeightBlack;
              font-size: $h4FontSize;
          }
  
          .user-data-value {
              font-family: $textFont;
              color: $headlineColor;
              font-weight: $textFontWeight;
              font-size: $h4FontSize;
              padding: 0.5rem 1rem;
              border: none;
              border-bottom: 1px solid $primaryColor;
              outline: none;
          }
      }
  }
}
</style>
