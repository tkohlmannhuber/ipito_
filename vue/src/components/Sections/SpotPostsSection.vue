<template>
  <section class="spot-post-container">
    <Headline2 :title="headlineText.text + ' ' + this.$route.params.title"/>
    <PostList />
    
  </section>
</template>

<script>

import PostList from '../Partials/PostList';
import Headline2 from '../Partials/Headline2';

export default {
  name: 'europepostsection',
  components: {
    PostList,
    Headline2,
  },
  data:() => {
    return {
      headlineText: {
        text: "Top Posts of"
      }
    }
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .spot-post-container{
    padding: 2.5em 0;
    text-align: center;
    position: relative;
    display: flex; 
    justify-content: center;
    flex-direction: column;


    &:after{
      content: '';
      position: absolute;
      width: 100%;
      height: 15em;
      background-image: url("../../assets/images/bg-brush-white.png");
      bottom: -14em;
      left: 0;
      transform: rotate(180deg);
      z-index: 1;

    }

  }

</style>