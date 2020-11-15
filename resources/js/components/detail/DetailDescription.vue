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
          Color:
        </div>

        <div class="item-desc">
          <div
            v-for="(item, index) in variantSize"
            :key="index"
            class="inputGroup"
          >
            <input
              :id="`variant-size-${index}`"
              name="variant-size"
              type="radio"
            />

            <label :for="`variant-size-${index}`">
              {{ item }}
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
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
  },

  computed: {
    variantSize() {
      return this.product.variant_size.split(",");
    },
  },
}
</script>
