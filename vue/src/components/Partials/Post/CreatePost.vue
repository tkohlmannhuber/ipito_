<template>
    <div>
        <h2 class="create-success" v-if="createSuccess">
            Post Successfully Created!
        </h2>

        <form
            v-if="!createSuccess"
            action="#"
            class="create-post-container"
            enctype="multipart/form-data"
        >
            <label for="img-upload" class="drop-zone">
                <div class="drop-zone-text-container">
                    <img
                        v-if="!newPost.image"
                        src="@/assets/images/icons/upload_icon.svg"
                        alt="Drag and Drop Icon"
                    />
                    <input
                        v-if="!newPost.image"
                        id="img-upload"
                        class="file-input"
                        type="file"
                        @change="onImageSelected"
                    />
                    <span class="drop-zone-text" v-if="!newPost.image"
                        >Click and select a pic</span
                    >
                    <p v-if="newPost.image != null" class="selected-img-text">
                        <span class="img-name-label">Selected Image: </span>
                        <span>{{ newPost.image.name }}</span>
                    </p>
                </div>
            </label>

            <h2>Create <span class="red">A</span> Post</h2>

            <div class="post-input-container">
                <div class="post-input-flex">
                    <label for="postheadline">Headline:</label>
                    <input
                        required
                        type="text"
                        id="postheadline"
                        v-model="newPost.title"
                    />
                </div>
                <div class="post-input-flex textarea-flex">
                    <label for="postheadline">Text:</label>
                    <textarea
                        required
                        name="text"
                        id="text"
                        cols="40"
                        rows="5"
                        v-model="newPost.content"
                    ></textarea>
                </div>
                <Loader v-if="loader" />
                <p class="red" v-if="error">
                    Something went wrong, please try again!
                </p>

                <button
                    type="submit"
                    @click.prevent="savePost()"
                    v-if="showSubmit"
                >
                    <img
                        src="@/assets/images/icons/submit_icon.svg"
                        alt="Paper Plane"
                    />
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";
import axios from "axios";
import Loader from "../../Partials/Loader";

export default {
    name: "createpost",
    components: {
        Loader,
    },
    props: {
        spot: Object,
    },
    data: () => {
        return {
            newPost: {
                title: "",
                content: "",
                spot_id: "",
                image: null,
                user_id: "",
            },
            posts: [],

            showSubmit: true,
            createSuccess: false,

            loader: false,
            error: false,
        };
    },
    methods: {
        onImageSelected(event) {
            this.newPost.image = event.target.files[0];
        },
        getSpot() {
            const postSpot = this.$route.params.id;
            this.newPost.spot_id = postSpot;
        },

        savePost() {
            let formData = new FormData();
            formData.append("image", this.newPost.image);
            formData.append("title", this.newPost.title);
            formData.append("content", this.newPost.content);
            formData.append("spot_id", this.newPost.spot_id);
            formData.append("user_id", this.newPost.user_id);

            this.loader = true;
            this.showSubmit = false;
            axios
                .post("https://api.ipito.surf/api/posts/store", formData)
                .then(() => {
                    this.loader = false;
                    this.showSubmit = true;
                    this.createSuccess = true;
                    this.error = false;
                })
                .catch(() => {
                    this.loader = false;
                    this.showSubmit = true;
                    this.error = true;
                });
        },
    },

    created() {
        this.getSpot();
    },

    mounted() {
        this.getSpot();

        userDataService.me().then((userData) => {
            this.newPost.user_id = userData.id;
        });
    },
    updated() {
        this.getSpot();
        userDataService.me().then((userData) => {
            this.newPost.user_id = userData.id;
        });
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.create-post-container {
    padding: 2em;
    background-image: url("../../../assets/images/greenstart-bg.png");
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;

    @include media(">=xs") {
        padding: 6em;
    }

    @include media(">=lg") {
        flex-direction: row;
        padding: 2em;
    }
    .drop-zone {
        margin: 2em;
        width: 15em;
        height: 15em;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px dashed $tertiaryColor;
        border-radius: $borderRadius;
        position: relative;
        cursor: pointer;

        &:hover {
            border-style: solid;
        }

        .file-input {
            z-index: -1;
            opacity: 0;
        }

        &::after {
            content: "";
            position: absolute;
            width: 120%;
            height: 120%;
            border: 2px solid $primaryColor;
            border-radius: $borderRadius;
        }

        .drop-zone-text-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0em;

            img {
                width: 3em;
            }
            span {
                text-transform: uppercase;
                font-weight: $textFontWeight;
            }

            .selected-img-text {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

                .img-name-label{
                    font-family: $headlineFont;
                    font-size: 1.2em;
                }
            }
        }
    }

    .post-input-container {
        display: flex;
        flex-direction: column;
        gap: 2em;

        .post-input-flex {
            display: flex;
            width: 100%;

            input {
                background: none;
                border: none;
                border-bottom: 1px solid $primaryColor;
                width: 100%;
                outline: none;
                font-size: $textFontSize;
                font-family: $textFont;
                padding: 0em 1em;
            }

            label {
                color: $primaryColor;
                border-bottom: 1px solid $primaryColor;
            }
        }
        .textarea-flex {
            display: flex;
            flex-direction: column;
            gap: 0.5em;

            label {
                border-bottom: none;
            }

            textarea {
                font-size: $textFontSize;
                font-family: $textFont;

                background: none;
                outline: none;
            }
        }

        button {
            width: 3.5em;
            height: 3.5em;
            border-radius: 50%;
            border: none;
            background: $tertiaryColor;
            box-shadow: $boxShadow;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.5s;

            img {
                width: 1.8em;
            }

            &:hover {
                transform: scale(1.1);
            }
        }
    }

    h2 {
        margin: 1em 0;
        padding: 0;
        @include media(">=lg") {
            transform: rotate(-90deg);
        }
    }
}
.create-success {
    transform: rotate(0deg);
    padding: 2em;
    background-image: url("../../../assets/images/greenstart-bg.png");
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
}
</style>
