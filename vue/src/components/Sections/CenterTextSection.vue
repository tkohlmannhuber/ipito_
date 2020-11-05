<template>
  <section class="content-wrapper">
    <h2>
      {{ title }}
    </h2>
    <p>
      {{ text }}
    </p>
    <!-- <input type="file" accept="image/*" capture="camera" /> -->
  </section>
</template>

<script>
export default {
  name: "centertextsection",
  props: {
    title: String,
    text: String,
  },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

section {
  text-align: center;
  max-width: 100ch;
  margin: 2.5em auto;
}

@include media(">=xs") {
  section {
    margin: 2.5em auto;
    padding-bottom: 8em;
  }
}
</style>
