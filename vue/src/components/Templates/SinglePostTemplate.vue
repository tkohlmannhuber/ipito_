<template>
    <div>
        <div class="load-container" v-if="isLoading">
            <h1>Loading!</h1>
            <Loader />
        </div>
        <transition name="post">
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
                    <div>
                        <p class="post-date">
                            {{ post.created_at | formatDate }}
                        </p>
                    </div>
                    <div class="avatar_flex">
                        <span>{{ post.user.username }}</span>
                        <img
                            class="single-post-user-img"
                            v-if="post.user.image_path"
                            :src="
                                'https://api.ipito.surf/storage/images/' +
                                    post.user.image_path
                            "
                            alt="User Bild"
                            width="200"
                        />
                        <div
                            class="no-user-img-container"
                            v-if="!post.user.image_path"
                        >
                            <img
                                class="no-user-img"
                                src="@/assets/images/icons/users.svg"
                                alt="user image"
                            />
                        </div>
                    </div>
                </div>
                <div class="read-post-content">
                    <div class="post-img-container">
                        <img
                            :src="
                                'https://api.ipito.surf/storage/images/' +
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
        </transition>
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
                    "https://api.ipito.surf/api/posts/show/" +
                        this.$route.params.id
                )
                .then((res) => {
                    this.post = res.data;
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

        .post-date {
            font-family: $headlineFont;

            @include media(">=sm") {
                font-size: 1.3em;
            }
        }

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

            .single-post-user-img {
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

            .no-user-img-container {
                width: 3em;
                height: 3em;
                background: $tertiaryColorLight;
                border-radius: 100%;
                display: grid;
                place-items: center;
                margin-left: 1em;
                img {
                    object-fit: contain;
                    width: 1.5em;
                    height: 1.5em;
                }
            }
        }
    }

    .read-post-content {
        margin: 2em 0;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 2em;

        .text-container {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .post-img-container {
            object-fit: cover;
            max-height: 25em;
            max-width: 25em;
            overflow: hidden;
            border-radius: $borderRadius;
            box-shadow: $boxShadow;

            img {
                display: flex;
                width: 100%;
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
            font-family: $headlineFont;
            text-transform: uppercase;

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

.post-enter,
.post-leave-to {
    opacity: 0;
}

.post-enter-active,
.post-leave-active {
    transition: all 0.5s ease;
}
</style>
