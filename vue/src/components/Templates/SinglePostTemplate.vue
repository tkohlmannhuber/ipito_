<template>
    <div>
        <div class="load-container" v-if="isLoading">
            <h1>Loading!</h1>
            <Loader />
        </div>
        <div class="read-post-container" v-if="!isLoading">
            <div class="post_top_flex">
                <div class="like_flex">
                    <img
                        src="@/assets/images/icons/shaka.svg"
                        alt="Shaka hand"
                        width="100"
                    />
                    <span></span>
                </div>
                <div class="avatar_flex">
                    <span>{{ post.user.username }}</span>
                    <img
                        :src="
                            'http://api.ipito.local/storage/images/' +
                                post.user.image_path
                        "
                        alt="User Bild"
                        width="200"
                    />
                </div>
            </div>
            <div class="read-post-content">
                <div class="post-img-container">
                    <img
                        :src="
                            'http://api.ipito.local/storage/images/' +
                                post.image_path
                        "
                        alt="surfer"
                        width="100"
                    />
                </div>
                <div class="text-container">
                    <h3>{{ post.title }}</h3>
                    <h4>{{ post.spot.spot_title }}</h4>
                    <p>
                        {{ post.content }}
                    </p>
                </div>
            </div>
            <div class="back-btn-flex">
                <button class="back-btn" @click="goBack()">Back</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Loader from "../Partials/Loader";
export default {
    name: "singleposttemplate",
    components: {
        Loader,
    },

    data: () => {
        return {
            post_id: "",
            post: "",
            isLoading: true,
        };
    },

    methods: {
        getPostId() {
            this.post_id = this.$route.params.id;
        },

        getPost() {
            axios
                .get(
                    "http://api.ipito.local/api/posts/show/" +
                        this.$route.params.id
                )
                .then((res) => {
                    this.post = res.data;
                    console.log(this.post);
                    this.isLoading = false;
                });
        },
        goBack() {
            window.history.back();
        },
    },
    created() {
        this.getPost();
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.load-container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.read-post-container {
    padding: 2em;
    margin: 8em 1em 2em;
    background-image: url("../../assets/images/greenstart-bg.png");
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
    display: flex;
    flex-direction: column;

    @include media(">=xs") {
        margin: 6em 3em 2em;
    }
    @include media(">=md") {
        margin: 4em auto;
    }

    .post_top_flex {
        display: flex;
        justify-content: space-between;
        align-items: center;

        .like_flex {
            display: flex;
            align-items: center;

            img {
                width: 2.5em;
                transform: rotate(45deg);
                margin-right: 0.5em;
            }
        }

        .avatar_flex {
            display: flex;
            align-items: center;
            justify-content: space-between;

            img {
                width: 3em;
                height: 3em;
                object-fit: cover;
                border-radius: 100%;
                margin-left: 1em;
            }
            span {
                color: $primaryColor;
                font-weight: $textFontWeight;
            }
        }
    }

    .read-post-content {
        margin: 2em 0;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;

        .post-img-container {
            object-fit: cover;

            img {
                width: 100%;
                overflow: hidden;
                border-radius: $borderRadius;
                box-shadow: $boxShadow;
            }

            @include media(">=xs") {
                max-width: 25em;
                margin-bottom: 0;
            }
        }

        @include media(">=md") {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            .text-container {
                width: 40ch;
                margin-left: 3em;
            }
        }
    }
    .back-btn-flex {
        display: flex;
        justify-content: flex-end;
        margin-right: 3em;
        &:hover {
            .back-btn {
                &::after {
                    transform: translateX(1em);
                }
            }
        }
        .back-btn {
            border: none;
            background: none;
            position: relative;
            color: $textColor;
            cursor: pointer;
            outline: none;

            &::after {
                content: "";
                position: absolute;
                background-image: url("../../assets/images/arrow_next.svg");
                background-repeat: no-repeat;
                width: 3em;
                height: 100%;
                top: 0.2em;
                transform: translateX(0.5em);
                transition: all 0.5s;
            }
        }
    }
}
</style>
