<template>
  <h1>
    {{title}}
  </h1>
</template>

<script>
export default {
  name: 'headline',
  props:{
    title: String,
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

h1{
  line-height: 1;
}

</style>