<template>
  <div class="product-detail__slide-two">
    <div class="product-detail__slide-two__big">
      <div
        v-for="(item, index) in images"
        :key="index"
        class="slider__item"
      >
        <img :src="`${path}${item}`" />
      </div>
    </div>

    <div class="product-detail__slide-two__small">
      <div
        v-for="(item, index) in images"
        :key="index"
        class="slider__item"
      >
        <img :src="`${path}${item}`" />
      </div>
    </div>

    <!-- <VueSlickCarousel
      ref="c1"
      :asNavFor="$refs.c2"
      :focusOnSelect="true"
      :arrows="true"
    >
      <div
        v-for="(item, index) in images"
        :key="index"
        class="slider__item"
      >
        <img :src="`${path}${item}`" />
      </div>
    </VueSlickCarousel>

    <VueSlickCarousel
      ref="c2"
      :asNavFor="$refs.c1"
      :slidesToShow="4"
      :focusOnSelect="true"
    >
      <div
        v-for="(item, index) in images"
        :key="index"
        class="slider__item"
      >
        <img :src="`${path}${item}`" />
      </div>
    </VueSlickCarousel> -->
  </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
  components: {
    VueSlickCarousel,
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

  computed: {
    path() {
      return `/${process.env.PATH_PRODUCT}/${this.slug}/`;
    },
  },

  methods: {

  },
}
</script>
