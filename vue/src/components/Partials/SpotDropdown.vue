<template>
  
  <li class="menu-item" @click="isOpen = !isOpen">
    <div>
      {{ title }}
    </div>
    <transition name="fade" appear >
      <div class="sub-menu" v-if="isOpen">
        <div v-for="(item, i) in items" :key="i" class="sub-menu-item" >
          <a :href="item.link"> {{ item.title }} </a>
        </div>  
      </div> 
    </transition>
    
  </li>
  
</template>

<script>
export default {
  name: 'spotdropdown',
  props: ['title', 'items'],
  data () {
    return {

      isOpen: false
    }
  }
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .menu-item{

    .sub-menu{
      width: 100vw;
      position: absolute;
      background: grey ;
      padding: 1em;
      top: calc(100% - 1em);

      .sub-menu-item{
        margin-bottom: 1em;
      }
    }

    .fade-enter-active,
    .fade-leave-active{
      transition: all .5s ease;
    }


    .fade-enter,
    .fade-leave-to {
      opacity: 0;
    }

  }


</style>