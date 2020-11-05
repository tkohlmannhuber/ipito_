<template>
  <div class="forecast-day-flex">
    <div
      class="single-day-container"
      v-for="weekday in weekdays"
      :key="weekday.day"
    >
      <h3>{{ weekday.day }}</h3>
      <p>{{ weekday.wave }}</p>
      <p>Low Tide: {{ weekday.lTide }}</p>
      <p>High Tide: {{ weekday.hTide }}</p>
      <p>{{ weekday.moon }}</p>
      <p>{{ weekday.wind }}</p>
      <p>{{ weekday.temp }}</p>
    </div>
  </div>
</template>

<script>


export default {
  name: "forecastsingleday",
  components:{
  },
  data: () => {
    return {
      weekdays: [
        {
          day: "monday",
          date: "20.10.2020",
          wave: "3ft - 4ft",
          lTide: "12:30",
          hTide: "0:30",
          moon: "Full-Moon",
          wind: "On-Shore",
          temp: "20°",
        },
        {
          day: "thuesday",
          date: "21.10.2020",
          wave: "2ft - 3ft",
          lTide: "13:30",
          hTide: "1:30",
          moon: "Full-Moon",
          wind: "Off-Shore",
          temp: "17°",
        },
        {
          day: "wednesday",
          date: "22.10.2020",
          wave: "3.5ft - 4ft",
          lTide: "14:30",
          hTide: "2:30",
          moon: "Full-Moon",
          wind: "On-Shore",
          temp: "19°",
        },
        {
          day: "thursday",
          date: "23.10.2020",
          wave: "1ft - 2ft",
          lTide: "15:30",
          hTide: "3:30",
          moon: "Full-Moon",
          wind: "Off-Shore",
          temp: "23°",
        },
        {
          day: "friday",
          date: "24.10.2020",
          wave: "0.5ft - 2ft",
          lTide: "16:30",
          hTide: "4:30",
          moon: "Full-Moon",
          wind: "On-Shore",
          temp: "22°",
        },
        {
          day: "saturday",
          date: "25.10.2020",
          wave: "5ft - 6ft",
          lTide: "17:30",
          hTide: "5:30",
          moon: "Full-Moon",
          wind: "Off-Shore",
          temp: "19°",
        },
        {
          day: "sunday",
          date: "26.10.2020",
          wave: "2ft - 4ft",
          lTide: "18:30",
          hTide: "6:30",
          moon: "Full-Moon",
          wind: "On-Shore",
          temp: "25°",
        },
      ],
    };
  },
  methods:{
  }
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.forecast-day-flex {
  display: flex;
  gap: 2em;
  .single-day-container {
    padding: 2em;
    background-image: url("../../assets/images/greenstart-bg.png");
    display: flex;
    flex-direction: column;
    gap: .8em;
    justify-content: center;
    text-align: center;
    border-radius: $borderRadius;
    box-shadow: $boxShadow;
    min-width: 15em;
  }
}
</style>
