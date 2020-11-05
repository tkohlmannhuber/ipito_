<template>
  <div class="single_post_container">
    <div class="post_top_flex">
      <div class="like_flex">
        <img src="@/assets/images/icons/shaka.svg" alt="Shaka hand" width="100">
        <span>435</span>
      </div>
      <div class="avatar_flex">
        <span>Jordan</span>
        <img src="@/assets/images/avatar.jpg" alt="User Bild" width="200">
      </div>
    </div>
    <div class="img_flex">
      <div class="img_container">
        <img src="@/assets/images/post_img.jpg" alt="Surfer" width="200">
      </div>
      <button class="like_btn">
        <img src="@/assets/images/icons/shaka.svg" alt="shaka hand" width="100">
      </button>
      <span class="post_spot"> Ericeira </span>
    </div>
    <button>Read <span class="red">the </span>Post</button>
  </div>  
</template>

<script>
export default {
  name: 'post',
}
</script>

<style lang="scss" src="@/assets/styles/app.scss"></style>
<style lang="scss" scoped>
  @import '@/assets/styles/variables.scss';
  @import '@/assets/styles/app.scss';
  @import '@/assets/styles/mediaQueries.scss';

  .single_post_container{
    padding: 2em;
    background-image: url('../../assets/images/greenstart-bg.png');
    box-shadow: $boxShadow;
    max-width: 19em;

    .post_top_flex{
      display: flex;
      justify-content: space-between;
      align-items: center;

      .like_flex{
        display: flex;
        align-items: center;

        img{
          width: 2.5em;
          transform: rotate(45deg);
          margin-right: .5em;
        }
        span{
          color: $primaryColor;
          font-weight: $textFontWeight;
        }
      }

      .avatar_flex{
        display: flex; 
        align-items: center;

        img{
          width: 3em;
          height: 3em;
          object-fit: cover;
          border-radius: 100%;
          margin-left: 1em;
        }
        span{
          color: $primaryColor;
          font-weight: $textFontWeight;
        }
      }
    }
    .img_flex{
      margin-top: 1em;
      position: relative;

      .img_container{
        width: 15em;
        height: 15em;
        box-shadow: $boxShadow;
        overflow: hidden;

        img{
          object-fit: cover;
          width: 100%;
        }
      }

      .like_btn{
        border: none;
        background: white;
        border-radius: 100%;
        width: 2em;
        height: 2em;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 1.5em;
        right: 1.5em;
        cursor: pointer;
        outline: none;
        transition: all .5s ;

        &:hover{
          transform: scale(1.1);
        }

        img{
          width: 1.5em;
          transform: rotate(45deg);
        }
      }
      span{
        color: $primaryColor;
        font-weight: $textFontWeight;
        position: absolute;
        bottom: 2em;
        left: -2.8em;
        transform: rotate(-90deg);
      }
    }

    button{
      background: none;
      border: none;
      padding-top: 2em;
      font-size: $textFontSize;
      font-family: $headlineFont;
      font-weight: $headlineFontWeightBlack;
      text-transform: uppercase;
      outline: none;
      cursor: pointer;
    }

  }

</style>

