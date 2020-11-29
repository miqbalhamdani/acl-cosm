<template>
    <!-- <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">

        </div>
      </div>
    </div> -->

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Product Variant</h4>
    </div>

    <div class="card-content">
      <div class="card-body">
        <div class="form-body">
          <input
            type="hidden"
            name="variant_size"
            v-model="sizeList"
          >
          <input
            type="hidden"
            name="variants"
            v-model="variant"
          >
          <input
            type="hidden"
            name="sizeImages"
            v-model="sizeImages"
          >

          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="form-group">
                <label for="product-variant-name">
                  Variant Name
                </label>
                <div class="input-group">
                  <input
                    type="text"
                    v-model="name"
                    id="product-variant-name"
                    name="variant_name"
                    class="form-control"
                    placeholder="Enter Variant Name"
                  >
                </div>
              </div>

              <div class="form-group">
                <label for="product-variant-size">
                  {{ name }} Name
                </label>
                <div class="input-group">
                  <input
                    type="text"
                    v-model="size"
                    id="product-variant-size"
                    class="form-control"
                    :placeholder="`Enter ${name} Name`"
                    aria-describedby="button-addon2"
                    @keyup.13="addVariant(size)"
                  >
                  <div class="input-group-append">
                    <button
                      class="btn btn-primary"
                      type="button"
                      @click="addVariant(size)"
                    >
                      <i class="bx bx-plus"></i>
                      Add Item
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button
                  v-for="(item, index) in sizeList"
                  :key="index"
                  type="button"
                  class="btn btn-outline-info round mr-1 mb-1"
                  @click="removeVariant(item)"
                >
                  <i class="bx bx-x"></i>
                  <span class="align-middle ml-25">
                    {{ item }}
                  </span>
                </button>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-6 p-0">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  <thead>
                    <tr>
                      <th>{{ name }} Name</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <VariantItem
                      v-for="(item, index) in firstList"
                      :key="index"
                      :index="index"
                      :item="item"
                      :slug="slug"
                      @image-set="setImage"
                      @image-remove="removeImage"
                    />
                  </tbody>
                </table>
              </div>
            </div>

            <div class="col-sm-12 col-md-6 p-0">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  <thead>
                    <tr>
                      <th>{{ name }} Name</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <VariantItem
                      v-for="(item, index) in secondList"
                      :key="index"
                      :index="index"
                      :item="item"
                      :slug="slug"
                      @image-set="setImage"
                      @image-remove="removeImage"
                    />
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import swal from 'sweetalert2';
import VariantItem from './VariantItem';

export default {
  components: {
    VariantItem,
  },

  data() {
    return {
      name: '',
      size: '',
      sizeList: [],
      form: [],
    };
  },

  props: {
    id: {
      type: String,
      required: true,
    },

    slug: {
      type: String,
      required: true,
    },

    variants: {
      type: Array,
      required: true,
    },

    arrSize: {
      type: Array,
      required: false,
    },
  },

  computed: {
    variant() {
      return JSON.stringify(this.form);
    },

    sizeImages() {
      const list = this.form.map((item) => item.image);
      return list.join(',');
    },

    halfForm() {
      return Math.ceil(this.totalForm / 2);
    },

    totalForm() {
      return this.form.length;
    },

    firstList() {
      return this.form.slice(0, this.halfForm);
    },

    secondList() {
      return this.form.slice(this.halfForm, this.totalForm);
    },
  },

  created() {
    if (this.variants.length > 0) {
      this.form = [...this.variants];
    }

    if (this.arrSize.length > 0) {
      this.sizeList = [...this.arrSize];
    }
  },

  methods: {
    setImage(payload) {
      const { name, index } = payload;
      this.form[index].image = name;
    },

    removeImage(index) {
      this.form[index].image = '';
    },

    getRandomInt() {
      const today = String(new Date().valueOf());
      const timestamp = today.substr(today.length - 5);
      return timestamp;
    },

    addVariant(value) {
      const name = value.trim();
      let list = this.sizeList;

      // check if empty
      if (name === '') return;

      // check if same name
      if (list.length > 0 && list.includes(name)) return;

      // CREATE NEW ONE
      const newVariant = {
        size: name,
        sku: this.getRandomInt(),
        image: '',
      };
      this.form.push(newVariant);

      // insert to size list
      list.push(name);

      // reset size name
      this.size = '';
    },

    removeVariant(name) {
      swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          // remove form data
          const newForm = this.form.filter((item) => item.size !== name);
          this.form = [...newForm];

          // remove list data
          const indexList = this.sizeList.indexOf(name);
          this.sizeList.splice(indexList, 1);
        };
      });
    },
  },
}
</script>
