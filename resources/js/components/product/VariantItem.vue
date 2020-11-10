<template>
  <tr>
    <td>{{ item.size }}</td>

    <td class="variant-item" :style="{ 'width': '100px' }">
      <div class="form-group m-0">
        <template v-if="!imagePreview && !item.image">
          <label :for="`image-${item.sku}`" class="picture">
            <img
              src="/img/icon/pic.svg"
              alt="Variant"
              width="22px"
            >
            <input
              type="file"
              :id="`image-${item.sku}`"
              accept="image/x-png,image/png,image/jpg,image/jpeg"
              @change="onImageChange()"
            >
          </label>
        </template>

        <template v-else>
          <div class="image-preview-wrapper">
            <div
              class="image-preview"
              :style="{ 'background-image': `url(${backgroudImage})` }"
            />
            <div class="image-preview-overlay">
              <button
                type="button"
                class="remove-image-preview"
                @click="onImageRemove"
              >
                remove
              </button>
            </div>
          </div>
        </template>
      </div>
    </td>
  </tr>
</template>

<script>
export default {
  data() {
    return {
      imagePreview: null,
    };
  },

  props: {
    item: {
      type: Object,
      required: true,
    },

    index: {
      type: Number,
      required: true,
    },

    slug: {
      type: String,
      required: true,
    },
  },

  computed: {
    productPath() {
      return process.env.PATH_PRODUCT;
    },

    backgroudImage() {
      if (this.imagePreview) return this.imagePreview;

      return `/${this.productPath}/${this.slug}/${this.item.image}`;
    },
  },

  methods: {
    setPayload(imageName) {
      const arrayImage = imageName.split('.');
      const ext = arrayImage[arrayImage.length - 1];
      const name = `${this.item.sku}.${ext}`;

      return {
        name,
        index: this.index,
      };
    },

    imageAdd(image) {
      const config = {
        headers: { 'content-type': 'multipart/form-data' },
      };

      const formData = new FormData();
      formData.append('name', this.item.sku);
      formData.append('file', image);

      return new Promise((resolve) => {
        this.axios.post('/admin/product/images/upload', formData, config)
          .then((response) => {
            resolve(response.data);
          })
          .catch((error) => {
            console.log('error image add by manualy', error);
          });
      });
    },

    imageRender(image) {
      let reader = new FileReader();
      reader.onload = (e) => {
          this.imagePreview = e.target.result;
      };
      reader.readAsDataURL(image);
    },

    async onImageChange() {
      const image = event.target.files[0];
      const renderImage = await this.imageRender(image);
      const imageUpload = await this.imageAdd(image);

      const payload = await this.setPayload(image.name);
      this.$emit('image-set', payload);
    },

    imageRemove() {
      const params = {
        name: this.item.image,
        slug: this.slug,
      };

      return new Promise((resolve) => {
        this.axios.post('/admin/product/images/remove', params)
          .then((response) => {
            resolve(response.data);
          })
          .catch((error) => {
            console.log('error remove image manualy', error);
          });
      });
    },

    onImageRemove() {
      if (this.imagePreview) this.imagePreview = null;

      this.imageRemove();
      this.$emit('image-remove', this.index);
    },
  },
}
</script>
