<template>
    <section class="moon-detail-section">
        <Headline class="moon-headline" title="Full Moon" />
        <div class="moon-text-flex">
            <img src="../../assets/images/moon.png" alt="" />
            <p>
                Sand bottom jumbled shorebreak send it monsters. Wave kook in da
                wa spit Nat Young, hollow pose on the nose, sets keyhole big
                finner? Back dooring reef kook of the day pitter dredging,
                double-up longboard smooth quad fin the OB. Line-up grommet spit
                goin’ mad air section?
            </p>
        </div>
    </section>
</template>

<script>
import Headline from "../Partials/Headline";
// import axios from "axios";

export default {
    name: "herosection",
    components: {
        Headline,
    },
    data: () => {
        return {
            phases: [
                {
                    phaseName: "Waxing Crescent",
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

.moon-detail-section {
    padding: 5em 0;
    display: flex;
    flex-direction: column;
    align-items: center;

    background: black;

    .moon-headline {
        color: rgba(white, 0.95);
    }

    .moon-text-flex {
        display: flex;
        align-items: center;
        justify-content: space-around;
        gap: 5em;
        margin: 3em;
    }

    img {
        width: 20em;
    }

    p {
        max-width: 70ch;
        color: rgba(white, 0.95);
    }
}
</style>
