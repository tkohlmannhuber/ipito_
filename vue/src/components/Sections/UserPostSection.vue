<template>
    <div class="user-post-section-container">
        <h2 v-if="allPosts.length > 0">All P<span class="red">O</span>sts</h2>
        <div v-if="loading" class="loading-container">
            <h3>Loading....</h3>
            <Loader />
        </div>
        <div v-if="allPosts.length < 1 && gotPosts" class="user-post-error">
            <h3>Somthing went wrong or there no Posts right now!</h3>
        </div>
        <transition name="fade">
            <div class="post-container">
                <div
                    class="single-post-container"
                    v-for="post in allPosts"
                    :key="post.id"
                >
                    <span class="post-spot">
                        {{ post.spot.spot_title }}
                    </span>
                    <div class="img_flex">
                        <div class="img_container">
                            <img
                                :src="
                                    'https://api.ipito.surf/storage/images/' +
                                        post.image_path
                                "
                                alt="Surfer"
                                width="200"
                            />
                        </div>
                    </div>
                    <div class="post-title">
                        <h3>{{ post.title }}</h3>
                    </div>
                    <div class="post-text">
                        <p>{{ post.content }}</p>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import axios from "axios";
import Loader from "../Partials/Loader";

export default {
    name: "userpostsection",
    components: {
        Loader,
    },
    data: () => {
        return {
            allPosts: "",
            loading: true,
            gotPosts: false,
        };
    },

    methods: {
        getAllPosts() {
            axios
                .get("https://api.ipito.surf/api/userposts/index", {
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "multipart/form-data",
                        Authorization:
                            "Bearer " + localStorage.getItem("token"),
                    },
                })
                .then((res) => {
                    this.allPosts = res.data;
                    this.loading = false;
                    this.gotPosts = true;
                })
                .catch(()=> {
                    this.gotPosts = false;
                })
        },
    },
    created() {
        this.getAllPosts();
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.user-post-section-container {
    padding: 3em;
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
    background: white;

    .loading-container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .post-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 4em;
        @include media('>=sm'){
            gap: 5em;
        }



        .single-post-container {
            padding: 2em;
            background-image: url("../../assets/images/greenstart-bg.png");
            box-shadow: $boxShadow;
            max-width: 19em;
            border-radius: $borderRadius;
            margin: 2em 0;
            display: flex;
            flex-direction: column;
            gap: 1em;

            .post-spot{
                font-family: $headlineFont;
                text-transform: uppercase;
                font-weight: $headlineFontWeightBlack;
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
            }
        }
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
