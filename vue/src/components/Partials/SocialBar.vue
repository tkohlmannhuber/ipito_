<template>
    <ul>
        <li><a :class="{moon: whiteSocialBar}" href="#">Facebook</a></li>
        <li><a :class="{moon: whiteSocialBar}" href="#">Instagram</a></li>
        <li><a :class="{moon: whiteSocialBar}" href="#">Twitter</a></li>
    </ul>
</template>

<script>
export default {
    name: "socialbar",
    data: () => {
        return {
            whiteSocialBar: false,
        };
    },
    watch: {
        $route() {
            if (this.$route.path === "/moon" || this.$route.path === "/login") {
                this.whiteSocialBar = true;
            } else {
                this.whiteSocialBar = false;
            }
        },
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

ul {
    display: flex;
    transform: rotate(90deg);
    position: fixed;
    right: -5.5em;
    margin: 0;
    padding: 0;
    top: 60%;
    z-index: 100;

    li {
        margin-right: 1em;

        a {
            color: $textColor;
            font-weight: $textFontWeight;
        }
    }

    li:last-child {
        margin-right: 0;
    }
}
.moon {
    color: white;
}
</style>
