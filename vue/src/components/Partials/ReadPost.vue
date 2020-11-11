<template>
    <div class="read-post-container">
        <div class="post_top_flex">
            <div class="like_flex">
                <img
                    src="@/assets/images/icons/shaka.svg"
                    alt="Shaka hand"
                    width="100"
                />
                <span>435</span>
            </div>
            <div class="avatar_flex">
                <span>Jordan</span>
                <img
                    src="@/assets/images/avatar/avatar.jpg"
                    alt="User Bild"
                    width="200"
                />
            </div>
        </div>
        <div class="read-post-content">
            <div class="post-img-container">
                <img
                    src="@/assets/images/post_img.jpg"
                    alt="surfer"
                    width="100"
                />
            </div>
            <div class="text-container">
                <h3>Perfect day in Ericeira!</h3>
                <h4>Ericeira</h4>
                <p>
                    Sand bottom jumbled shorebreak send it monsters. Wave kook
                    in da wa spit Nat Young, hollow pose on the nose, sets
                    keyhole big finner? Back dooring reef kook of the day pitter
                    dredging, double-up longboard smooth quad fin the OB.
                    Line-up grommet spit goin’ mad air section?
                </p>
            </div>
        </div>
        <div class="back-btn-flex">
            <button class="back-btn">Back</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "createpost",
    components: {},
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.read-post-container {
    padding: 2em;
    margin: 4em 1em;
    background-image: url("../../assets/images/greenstart-bg.png");
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
    display: flex;
    flex-direction: column;

    @include media(">=xs") {
        margin: 4em 3em;
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
            span {
                color: $primaryColor;
                font-weight: $textFontWeight;
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
            width: 100%;
            margin-bottom: 2em;
            overflow: hidden;

            img {
                width: 100%;
                object-fit: cover;
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
