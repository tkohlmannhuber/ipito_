<template>
    <form action="#" class="create-post-container" v-on:submit="createPost">
        <div class="drop-zone">
            <div class="drop-zone-text-container">
                <img
                    src="@/assets/images/icons/upload_icon.svg"
                    alt="Drag and Drop Icon"
                />
                <input
                    class="file-input"
                    type="file"
                    @change="onImageSelected"
                />
                <span class="drop-zone-text">Drag and Drop A Pic</span>
            </div>
        </div>

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
            <button type="submit" v-on:submit.prevent="onSubmit">
                <img
                    src="@/assets/images/icons/submit_icon.svg"
                    alt="Paper Plane"
                />
            </button>
        </div>
    </form>
</template>

<script>
import postDataServiceLaravel from "@/services/postDataServiceLaravel";
import userDataService from "@/services/userDataService";


export default {
    name: "createpost",
    components: {
    },
    data: () => {
        return {
            newPost: {
                title: "",
                content: "",
                spot: "",
                image: null,
                userId: "",
            },
            posts: [],
        };
    },
    methods: {
        onImageSelected(event) {
            this.newPost.image = event.target.files[0];
        },
        getSpot() {
            const postSpot = this.$route.params.id;

            this.newPost.spot = postSpot;
        },
        createPost: function(e) {
            // das "Standardverhalten" von form-submit verhindern (sonst würde die Seite neu laden)
            e.preventDefault();

            // nun speichern wir hier die Funktion über unseren abstrahierten Service (postDataService)
            postDataServiceLaravel.store(this.newPost).then((newPostList) => {
                // nun, da wir das erfolgreiche Ergebnis von der API erhalten haben, aktualisieren wir unsere Komponenten Variable
                this.posts = newPostList;
            });

            // Formulardaten auf leere zurücksetzen
            this.newPost = {
                title: "",
                content: "",
            };
        },
    },

    mounted() {
        this.getSpot();

        userDataService.me().then((userData) => {
            this.newPost.userId = userData.id;
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

        .file-input {
            z-index: 1;
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
            gap: 1em;

            img {
                width: 3em;
            }
            span {
                text-transform: uppercase;
                font-weight: $textFontWeight;
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
</style>
