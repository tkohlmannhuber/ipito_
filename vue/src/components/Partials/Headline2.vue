<template>
  <h2>
    {{title}}
  </h2>
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



</style>