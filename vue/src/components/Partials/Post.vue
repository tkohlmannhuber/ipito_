<template>
    <div>
        <div class="load-container" v-if="isLoading">
            <span>Loading!</span>
            <Loader />
        </div>
        <div v-if="noPosts" class="no-posts-container">
            <h2>There are currently no posts created!</h2>
        </div>
        <VueSlickCarousel
            v-bind="settings"
            ref="carousel"
            v-if="gotPosts && !noPosts"
        >
            <div
                v-for="post in posts"
                :key="post.id"
                class="slide-post-container"
            >
                <div class="single_post_container">
                    <div class="post_top_flex">
                        <div class="like_flex">
                            <img
                                src="@/assets/images/icons/shaka.svg"
                                alt="Shaka hand"
                                width="100"
                            />
                            <span>{{ post.like_count }}</span>
                        </div>
                        <div class="avatar_flex">
                            <span class="post-usernae">{{
                                post.user.username
                            }}</span>
                            <img
                                class="user-img"
                                v-if="post.user.image_path"
                                :src="
                                    'http://api.ipito.local/storage/images/' +
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
                    <div class="img_flex">
                        <div class="img_container">
                            <img
                                v-if="post.image_path"
                                :src="
                                    'http://api.ipito.local/storage/images/' +
                                        post.image_path
                                "
                                alt="Surfer"
                                width="200"
                            />
                        </div>
                        <span class="post_spot">
                            {{ post.spot.spot_title }}
                        </span>
                    </div>
                    <router-link
                        class="read-btn"
                        :to="{ name: 'SinglePost', params: { id: post.id } }"
                    >
                        Read <span class="red">the </span>Post
                    </router-link>
                </div>
            </div>
        </VueSlickCarousel>
        <div class="slider_controll_container" v-if="gotPosts && !noPosts">
            <SliderBtnPrev @click.native="showPrev" class="slider-btn" />
            <span class="slider-text">next</span>
            <SliderBtnNext @click.native="showNext" class="slider-btn" />
        </div>
    </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import SliderBtnPrev from "../Partials/SliderBtnPrev";
import SliderBtnNext from "../Partials/SliderBtnNext";
import Loader from "../Partials/Loader";
import axios from "axios";

export default {
    name: "post",
    components: {
        VueSlickCarousel,
        SliderBtnPrev,
        SliderBtnNext,
        Loader,
    },

    data: () => {
        return {
            currentPost: null,
            currentRoute: null,
            homeRoute: null,
            posts: [],
            gotPosts: false,
            isLoading: true,
            noPosts: null,

            settings: {
                slidesToShow: 4,
                speed: 500,
                responsive: [
                    {
                        breakpoint: 1440,
                        settings: {
                            slidesToShow: 3,
                        },
                    },

                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            },
        };
    },
    methods: {
        showNext() {
            this.$refs.carousel.next();
        },
        showPrev() {
            this.$refs.carousel.prev();
        },

        getCurrentRoute(currentRoute) {
            this.currentRoute = currentRoute;
        },

        getAllPosts() {
            if (this.$route.fullPath === "/") {
                axios
                    .get("http://api.ipito.local/api/posts/index",{
                        
                    })
                    .then((res) => {
                        if (res.data.length < 1) {
                            this.noPosts = true;
                        }
                        this.posts = res.data;
                        this.gotPosts = true;
                        this.isLoading = false;
                    });
            } else {
                axios
                    .get(
                        "http://api.ipito.local/api/posts/spotIndex/" +
                            this.currentRoute
                    )
                    .then((res) => {
                        if (res.data.length < 1) {
                            this.noPosts = true;
                        }
                        this.posts = res.data;
                        this.gotPosts = true;
                        this.isLoading = false;
                    });
            }
        },

    },

    mounted() {
        this.currentRoute = this.$route.params.id;
        this.getAllPosts();
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
    flex-direction: column;
    align-items: center;

    span {
        font-size: 2em;
        font-family: $headlineFont;
        font-weight: $headlineFontWeightBlack;
        text-transform: uppercase;
    }
}

.no-posts-container {
    padding: 2em;
    background: $tertiaryColorLight;
    border-radius: $borderRadius;
    display: grid;
    place-items: center;
    box-shadow: $boxShadow;
    margin: 4em;
}

.slider_controll_container {
    margin-top: 2em;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;

    @include media(">=md") {
        margin-bottom: 2.5em;
    }

    .slider-text {
        font-size: $h3FontSize;
        font-weight: $headlineFontWeightBlack;
        font-family: $headlineFont;
        color: $headlineColor;
        text-transform: uppercase;
        margin: 0 3em;
    }
}

.slide-post-container {
    display: flex !important; // ich weis das das sehr schlecht ist aba das display inline block kommt von der library und wird dort inline gestyled!
    justify-content: center;
    outline: none;
}

.single_post_container {
    padding: 2em;
    background-image: url("../../assets/images/greenstart-bg.png");
    box-shadow: $boxShadow;
    max-width: 19em;
    border-radius: $borderRadius;
    margin: 2em 0;
    display: flex;
    flex-direction: column;

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
            span {
                color: $primaryColor;
                font-weight: $textFontWeight;
            }
        }

        .avatar_flex {
            display: flex;
            align-items: center;

            .user-img {
                width: 3em;
                height: 3em;
                object-fit: cover;
                border-radius: 100%;
                margin-left: 1em;
            }
            span {
                color: $primaryColor;
                font-weight: $textFontWeight;
                font-family: $headlineFont;
                text-transform: uppercase;
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
    .img_flex {
        margin-top: 1em;
        position: relative;

        .img_container {
            width: 15em;
            height: 15em;
            box-shadow: $boxShadow;
            overflow: hidden;

            img {
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        }

        .like_btn {
            border: none;
            background: white;
            border-radius: 100%;
            width: 2em;
            height: 2em;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 1.5em;
            right: 1.5em;
            cursor: pointer;
            outline: none;
            transition: all 0.5s;

            &:hover {
                transform: scale(1.1);
            }

            img {
                width: 1.5em;
                transform: rotate(45deg);
            }
        }
        span {
            color: $primaryColor;
            font-weight: $textFontWeight;
            position: absolute;
            display: inline;
            bottom: 4em;
            left: -6em;
            width: 10em;
            transform: rotate(-90deg);
        }
    }

    .read-btn {
        background: none;
        border: none;
        padding-top: 2em;
        font-size: $textFontSize;
        font-family: $headlineFont;
        font-weight: $headlineFontWeightBlack;
        text-transform: uppercase;
        color: $textColor;
        outline: none;
        cursor: pointer;
        position: relative;

        &::after {
            content: "";
            position: absolute;
            background-image: url("../../assets/images/arrow_next.svg");
            background-repeat: no-repeat;
            width: 3em;
            height: 100%;
            transform: translateX(1em);
            transition: all 0.5s;
        }

        &:hover {
            &::after {
                transform: translateX(2em);
            }
        }
    }
}
</style>
