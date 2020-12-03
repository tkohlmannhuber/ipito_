<template>
    <div>
        <VueSlickCarousel v-bind="settings" ref="carousel">
            <div
                v-for="post in posts"
                :key="post.likes"
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
                            <span>{{ post.likes }}</span>
                        </div>
                        <div class="avatar_flex">
                            <span>{{ post.userFirstName }}</span>
                            <img
                                :src="post.avatarImagePath"
                                alt="User Bild"
                                width="200"
                            />
                        </div>
                    </div>
                    <div class="img_flex">
                        <div class="img_container">
                            <img
                                :src="post.postImagePath"
                                alt="Surfer"
                                width="200"
                            />
                        </div>
                        <button class="like_btn">
                            <img
                                src="@/assets/images/icons/shaka.svg"
                                alt="shaka hand"
                                width="100"
                            />
                        </button>
                        <span class="post_spot"> {{ post.spot }} </span>
                    </div>
                    <button class="read-btn" @click="setCurrentPost()">
                        Read <span class="red">the </span>Post
                    </button>
                </div>
            </div>
        </VueSlickCarousel>
        <div class="slider_controll_container">
            <SliderBtnPrev @click.native="showPrev" class="slider-btn" />
            <span class="slider-text">next</span>
            <SliderBtnNext @click.native="showNext" class="slider-btn" />
        </div>

        <ReadPost v-if="currentPost" v-bind="currentPost" />
    </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import SliderBtnPrev from "../Partials/SliderBtnPrev";
import SliderBtnNext from "../Partials/SliderBtnNext";

export default {
    name: "post",
    components: {
        VueSlickCarousel,
        SliderBtnPrev,
        SliderBtnNext,
    },

    methods: {
        setCurrentPost: (currentPost) => {
            this.currentPost = currentPost;
        },
        showNext() {
            this.$refs.carousel.next();
        },
        showPrev() {
            this.$refs.carousel.prev();
        }, 

        getCurrentRoute(currentRoute){
            this.currentRoute = currentRoute;
        },

        getHomeRoute(homeRoute){
            this.homeRoute = homeRoute;
        }
        
        
    },

    mounted () {
        this.currentRoute = this.$route.params.id
    },
    created () {
        this.homeRoute = this.$route
    },

    

    data: () => {
        return {
            currentPost: null,
            currentRoute : null,
            homeRoute : null,

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

            posts: [
                {
                    likes: 343,
                    userFirstName: "Jordan",
                    avatarImagePath: require("../../assets/images/avatar/avatar.jpg"),
                    postImagePath: require("../../assets/images/post_img/post_1.jpg"),
                    spot: "ericeira",
                },
                {
                    likes: 215,
                    userFirstName: "Rick",
                    avatarImagePath: require("../../assets/images/avatar/avatar4.jpg"),
                    postImagePath: require("../../assets/images/post_img/post_2.jpg"),
                    spot: "nazare",
                },

                {
                    likes: 430,
                    userFirstName: "Emma",
                    avatarImagePath: require("../../assets/images/avatar/avatar2.jpg"),
                    postImagePath: require("../../assets/images/post_img/post_3.jpg"),
                    spot: "mundaka",
                },
                {
                    likes: 343,
                    userFirstName: "Jordan",
                    avatarImagePath: require("../../assets/images/avatar/avatar.jpg"),
                    postImagePath: require("../../assets/images/post_img/post_1.jpg"),
                    spot: "ericeira",
                },
                {
                    likes: 215,
                    userFirstName: "Rick",
                    avatarImagePath: require("../../assets/images/avatar/avatar3.jpg"),
                    postImagePath: require("../../assets/images/post_img/post_2.jpg"),
                    spot: "nazare",
                },

                {
                    likes: 430,
                    userFirstName: "Emma",
                    avatarImagePath: require("../../assets/images/avatar/avatar2.jpg"),
                    postImagePath: require("../../assets/images/post_img/post_3.jpg"),
                    spot: "manduka",
                },
            ],
        };
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

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
            bottom: 2em;
            left: -2.8em;
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
