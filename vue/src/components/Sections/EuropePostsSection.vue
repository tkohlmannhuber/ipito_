<template>
  <section class="eu_post_container">
    <h2>Top Posts <span class="red"> of </span> Europe</h2>
    <PostList />
    <SliderControll text="swipe"/>
    
  </section>
</template>

<script>

import PostList from '../Partials/PostList';
import SliderControll from '../Partials/SliderControll';

export default {
  name: 'europepostsection',
  components: {
    PostList,
    SliderControll,
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .eu_post_container{
    width: 100vw;
    padding: 2.5em 0;
    text-align: center;
    background-image: url('../../assets/images/bg-light-beige.png'); 
    position: relative;

    &:before{
      content: '';
      position: absolute;
      width: 100%;
      height: 20em;
      background-image: url("../../assets/images/bg-brush-beige.png");
      background-repeat: no-repeat;
      top: -11em;
      left: 0;
      z-index: -1;
    }

    &:after{
      content: '';
      position: absolute;
      width: 100%;
      height: 15em;
      background-image: url("../../assets/images/bg-brush-beige.png");
      background-repeat: no-repeat;
      bottom: -11em;
      left: 0;
      transform: rotate(180deg);
      z-index: 1;

    }

  }

</style>