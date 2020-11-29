<template>
  <div class="product-detail__content">
    <div class="product-detail__content__header">
      <h5>{{ product.category.name }}</h5>
      <h1>{{ product.name }}</h1>
    </div>

    <div class="product-detail__content__footer">
      <div class="content-item">
        <div class="item-title">
          Brand:
          <span>{{ product.brand.name }}</span>
        </div>
      </div>

      <div class="divider" />

      <div class="content-item">
        <div class="item-title">
          {{ product.variant_name }}:
        </div>

        <div class="item-desc">
          <div
            v-for="(item, index) in variantSize"
            :key="index"
            class="inputGroup"
            @click="changeSlide(item)"
          >
            <input
              :id="`variant-size-${index}`"
              name="variant-size"
              type="radio"
            />

            <label :for="`variant-size-${index}`">
              {{ item.size }}
            </label>
          </div>
        </div>
      </div>

      <div class="content-item">
        <div class="item-title">
          Description:
        </div>

        <p v-html="product.description" class="item-desc" />
      </div>
    </div>
  </div>
</template>

<script>
import bus from '~/plugins/bus';

export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
  },

  computed: {
    variantSize() {
      return JSON.parse(this.product.variants);
    },
  },

  methods: {
    changeSlide(item) {
      bus.$emit('change-slide', item);
    },
  },
}
</script>
