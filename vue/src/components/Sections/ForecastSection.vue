<template>
  <section class="forecast-container">
    <h3 class="forecast-text"> 7 <span class="red"> Day </span> Forecast </h3>
    <SliderControll text="22.10.2020"/>
    <ForecastSingleDay />
  </section>
</template>

<script>

import ForecastSingleDay from "../Partials/ForecastSingleDay"
import SliderControll from "../Partials/SliderControll"

export default {
  name: 'forecastsection',
  components: {
    ForecastSingleDay,
    SliderControll,
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';


  .forecast-container{
    padding: 2.5em 0;
    display: flex; 
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100vw;
    position: relative;
    overflow: hidden;
  
    &::after{
      content: '';
      position: absolute;
      top: 0;
      left:0;
      width: 100%;
      height: 110%;
      background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.9037990196078431) 10%, rgba(255,255,255,0) 20%, rgba(255,255,255,0) 80%, rgba(255,255,255,0.9009978991596639) 90%, rgba(255,255,255,1) 100%);
    }
  


    .forecast-text{
      position: absolute;
      top: 55%;
      left: -3.5em;
      transform: rotate(-90deg);
      font-size: $h2FontSize;
      margin: 0;
      padding: 0;
      z-index: 10;

      @include media(">=xs"){
        left: -3em;
      }
    }
  }




</style>