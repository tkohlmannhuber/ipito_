<template>
  <div class="test">
    <HomeHeroSection />
    <CenterTextSection :title="homeCenterText.title" :text="homeCenterText.text" />
    <EuropePostsSection />
    <Footer />
  </div>
</template>

<script>

import HomeHeroSection from '../Sections/HomeHeroSection'
import EuropePostsSection from '../Sections/EuropePostsSection'
import CenterTextSection from '../Sections/CenterTextSection'
import Footer from '../Layout/Footer'

export default {
  name: 'test',
  components: {
    HomeHeroSection,
    EuropePostsSection,
    CenterTextSection,
    Footer,
  },
  data() {
    return {
      homeCenterText: {
        title: "Never miss a wave again",
        text: "Sand bottom jumbled shorebreak send it monsters. Wave kook in da wa spit Nat Young, hollow pose on the nose, sets keyhole big finner? Back dooring reef kook of the day pitter dredging, double-up longboard smooth quad fin the OB. Line-up grommet spit goin’ mad air section? "
      }

    }
  },

  
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .test{
    width: 100vw;
  }
</style>