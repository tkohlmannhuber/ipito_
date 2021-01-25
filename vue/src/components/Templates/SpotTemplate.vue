<template>
    <div class="test">
        <SpotHeroSection />
        <CenterTextSection
            :title="spotCenterText.title"
            :text="spotCenterText.text"
        />
        <ForecastSection />
        <CenterTextSection
            v-if="userData"
            :title="impressionsText.title"
            :text="impressionsText.text"
        />
        <CreatePostSection v-if="userData" />
        <SpotPostsSection />
        <Footer />
    </div>
</template>

<script>
import userDataService from "@/services/userDataService";

import SpotHeroSection from "../Sections/SpotHeroSection";
import CenterTextSection from "../Sections/CenterTextSection";
import ForecastSection from "../Sections/ForecastSection";
import CreatePostSection from "../Sections/CreatePostSection";
import SpotPostsSection from "../Sections/SpotPostsSection";
import Footer from "../Layout/Footer";

export default {
    name: "test",
    components: {
        SpotHeroSection,
        CenterTextSection,
        ForecastSection,
        CreatePostSection,
        SpotPostsSection,
        Footer,
    },
    data() {
        return {
            spotCenterText: {
                title: "Surf Capital of Portugal",
                text:
                    "Sand bottom jumbled shorebreak send it monsters. Wave kook in da wa spit Nat Young, hollow pose on the nose, sets keyhole big finner? Back dooring reef kook of the day pitter dredging, double-up longboard smooth quad fin the OB. Line-up grommet spit goin’ mad air section? ",
            },
            impressionsText: {
                title: "Spot Impressions!",
                text:
                    "Got some good impressions of this spot? Take some time and create a post or just look for other cool posts!",
            },
            userData: null,
        };
    },
    created() {
        userDataService.me().then((userData) => {
            this.userData = userData;
        });
    },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.test {
    width: 100%;
}
</style>
