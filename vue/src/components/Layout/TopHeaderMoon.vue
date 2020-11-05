<template>
  <div :class="{ sticky: scrollPosition > 0 }">
    <Navbar />
  </div>
</template>

<script>
import Navbar from "../Partials/Navbar";

export default {
  name: "topheadermoon",
  components: {
    Navbar,
  },
  data() {
    return {
      scrollPosition: null,
    };
  },
  methods: {
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
  },

  mounted() {
    window.addEventListener("scroll", this.updateScroll);
  },
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

div {
  position: fixed;
  z-index: 100;

  .wrapper {
    padding: 1.87em 2.5em;
  }
}
.sticky {
  color: white;
  background: rgba(0, 0, 0, 0.98);
  box-shadow: $boxShadow;
  .wrapper{
    padding: 1em 2em;
  }
}
</style>
