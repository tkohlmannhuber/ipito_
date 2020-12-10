<template>
  <section class="create-post-section">
    <CreatePost />
  </section>
</template>

<script>

import CreatePost from "../Partials/Post/CreatePost";

export default {
  name: 'createpostsection',
  components:{
    CreatePost,
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .create-post-section{
    margin: 2.5em 0;
    display: flex;
    justify-content: center;
    align-items: center;

  }

</style>