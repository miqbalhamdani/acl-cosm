<template>
  <div class="shop">
    <div class="container">
      <div class="product-detail__wrapper">
        <div class="row">
          <div class="col-12 col-md-6">
            <DetailPhotos
              :images="product.all_photos"
              :slug="product.slug"
            />
          </div>

          <div class="col-12 col-md-6">
            <DetailDescription
              :product="product"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DetailPhotos from '@/detail/DetailPhotos.vue';
import DetailDescription from '@/detail/DetailDescription.vue';

export default {
  components: {
    DetailPhotos,
    DetailDescription,
  },

  props: {
    product: {
      type: Object,
      required: true,
    },
  },
}
</script>
