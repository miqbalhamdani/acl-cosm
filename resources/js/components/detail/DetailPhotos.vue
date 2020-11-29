<template>
  <div class="product-detail__slide-two">
    <div class="thumb-example">
      <!-- swiper1 -->
      <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
        <swiper-slide
          v-for="(itemTop, indexTop) in images"
          :key="indexTop"
          :style="{ 'background-image': `url(${path}${itemTop})` }"
        ></swiper-slide>
        <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
        <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
      </swiper>

      <!-- swiper2 Thumbs -->
      <swiper class="swiper gallery-thumbs" :options="swiperOptionThumbs" ref="swiperThumbs">
        <swiper-slide
          v-for="(itemThumb, indexThumb) in images"
          :key="indexThumb"
          :style="{ 'background-image': `url(${path}${itemThumb})` }"
        ></swiper-slide>
      </swiper>
    </div>
  </div>
</template>

<script>
import bus from '~/plugins/bus';
import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper';
import 'swiper/css/swiper.css';

export default {
  components: {
    Swiper,
    SwiperSlide
  },

  props: {
    images: {
      type: Array,
      required: true,
    },

    slug: {
      type: String,
      required: true,
    },
  },

  data() {
    return {
      swiperOptionTop: {
        loop: true,
        loopedSlides: 5, // looped slides should be the same
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },

      swiperOptionThumbs: {
        loop: true,
        loopedSlides: 5, // looped slides should be the same
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
      },
    }
  },

  computed: {
    path() {
      return `/${process.env.PATH_PRODUCT}/${this.slug}/`;
    },

    swiper() {
      return this.$refs.swiperTop.$swiper
    }
  },

  beforeDestroy() {
    bus.$on('change-slide', this.changeSlide);
  },

  mounted() {
    this.$nextTick(() => {
      const swiperTop = this.$refs.swiperTop.$swiper
      const swiperThumbs = this.$refs.swiperThumbs.$swiper
      swiperTop.controller.control = swiperThumbs
      swiperThumbs.controller.control = swiperTop
    });

    bus.$on('change-slide', this.changeSlide);
  },

  methods: {
    changeSlide(item) {
      const index = this.images.findIndex((image) => image === item.image);
      if (index === -1) return;

      this.swiper.slideTo(index+5, 1000, false);
    },
  },
}
</script>

<style lang="scss" scoped>
.thumb-example {
  height: 750px;
  background-color: #FFF;
}

.swiper {
  .swiper-slide {
    background-size: cover;
    background-position: center;
  }

  &.gallery-top {
    height: 80%;
    width: 100%;
  }

  &.gallery-thumbs {
    height: 20%;
    box-sizing: border-box;
    padding: 10px 0;
  }

  &.gallery-thumbs .swiper-slide {
    width: 25%;
    height: 100%;
    opacity: 0.4;
  }

  &.gallery-thumbs .swiper-slide-active {
    opacity: 1;
  }
}
</style>
