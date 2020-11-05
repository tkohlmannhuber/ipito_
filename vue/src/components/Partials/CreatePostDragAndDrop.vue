<template>
  <div class="drop-zone">
    <div class="drop-zone-text-container">
      <img src="@/assets/images/icons/upload_icon.svg" alt="Drag and Drop Icon">
      <span class="drop-zone-text">Drag and Drop A Pic</span>
    </div>
  </div>
</template>

<script>
export default {
  name: '',
  
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';


.drop-zone{
  margin: 2em;
  width: 15em;
  height: 15em;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 4px dashed $tertiaryColor;
  border-radius: $borderRadius;
  position: relative;

  &::after{
    content: '';
    position: absolute;
    width: 120%;
    height: 120%;
    border: 2px solid $primaryColor;
    border-radius: $borderRadius;
  }


  .drop-zone-text-container{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1em;

    img{
      width: 3em;
    }
    span{
      text-transform: uppercase;
      font-weight: $textFontWeight;
    }
  }
}


</style>