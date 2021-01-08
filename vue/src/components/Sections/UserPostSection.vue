<template>
    <div class="user-post-section-container">
        <h2>All P<span class="red">O</span>sts</h2>
        <div
            v-for="post in allPosts"
            :key="post.id"
            class="post-container"
        >
            <div class="single_post_container">
                <span class="post_spot">
                    {{ post.spot.spot_title }}
                </span>
                <div class="img_flex">
                    <div class="img_container">
                        <img
                            :src="
                                'http://api.ipito.local/storage/images/' +
                                    post.image_path
                            "
                            alt="Surfer"
                            width="200"
                        />
                    </div>
                    <div class="post_top_flex">
                        <h3>{{ post.title }}</h3>
                    </div>
                    <div class="post_top_flex">
                        <p>{{ post.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "userpostsection",
    components: {},
    data: () => {
        return {
            allPosts: "",
        };
    },

    methods: {
        getAllPosts() {
            axios
                .get("http://api.ipito.local/api/userposts/index", {
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "multipart/form-data",
                        Authorization:
                            "Bearer " + localStorage.getItem("token"),
                    },
                })
                .then((res) => {
                    this.allPosts = res.data;
                });
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

    .post-container{
        display: grid; 
        grid-template-columns: 3;
        .single_post_container {
            padding: 2em;
            background-image: url("../../assets/images/greenstart-bg.png");
            box-shadow: $boxShadow;
            max-width: 19em;
            border-radius: $borderRadius;
            margin: 2em 0;
    
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
</style>
