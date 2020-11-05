<template>
    <div class="moon-phase-container">
        <router-link
            class="moon-phase-btn"
            :to="{ name: 'MoonDetail', params: { id: 'waxing-crescent' } }"
            >Waxing <span class="red">Crescent</span></router-link
        ><router-link
            class="moon-phase-btn"
            :to="{ name: 'MoonDetail', params: { id: 'first-quater' } }"
            ><span class="red">First</span> Quater</router-link
        ><router-link
            class="moon-phase-btn"
            :to="{ name: 'MoonDetail', params: { id: 'full-moon' } }"
            >Full <span class="red">Moon</span></router-link
        ><router-link
            class="moon-phase-btn"
            :to="{ name: 'MoonDetail', params: { id: 'last-quater' } }"
            ><span class="red">Last</span> Quater</router-link
        ><router-link
            class="moon-phase-btn"
            :to="{ name: 'MoonDetail', params: { id: 'wanning-crescent' } }"
            >Wanning <span class="red">Crescent</span></router-link
        >
    </div>
</template>

<script>
export default {
    name: "moonphasecontroll",
};
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/app.scss";
@import "@/assets/styles/mediaQueries.scss";

.moon-phase-container {
    position: absolute;
    display: flex;
    justify-content: space-around;
    width: 100%;
    bottom: 0;
    z-index: 1;
    .moon-phase-btn {
        color: white;
        font-size: $h3FontSize;
        font-family: $headlineFont;
        text-transform: uppercase;
    }

    &:nth-child(2n) {
        transform: translateY(5em);
    }
}
</style>
