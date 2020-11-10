<template>
    <div class="post-input-container">
        <div class="post-input-flex">
            <label for="postheadline">Headline:</label>
            <input type="text" id="postheadline" />
        </div>
        <div class="post-input-flex">
            <label for="postspot">Spot:</label>
            <input type="text" id="postspot" />
        </div>
        <div class="post-input-flex textarea-flex">
            <label for="postheadline">Text:</label>
            <textarea name="text" id="text" cols="40" rows="5"></textarea>
        </div>
        <button type="submit" v-on:submit.prevent="onSubmit">
            <img
                src="@/assets/images/icons/submit_icon.svg"
                alt="Paper Plane"
            />
        </button>
    </div>
</template>

<script>
export default {
    name: "createpostform",
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

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
        transition: all .5s;

        img {
            width: 1.8em;
        }

        &:hover{
        transform: scale(1.1);
        }
    }
}
</style>
