<template>
  <div>
    <img class="logo" src="../../assets/images/logo_bright.svg" alt="Logo">
    <p class="logo_text">I<span class="red logo_text">p</span>ito</p>
  </div>

  
</template>

<script>
export default {
  name: 'logobright',
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  div{
    display: flex;
    align-items: center;

    p{
      margin-left: 1em;
      font-size: $logoFontSize;
      font-family: $headlineFont;
      font-weight: $headlineFontWeightBlack;
      color: white;
      text-transform: uppercase;
    }
  }

</style>