<template>
  <div>
    <h2>Product List</h2>
    <ul>
      <li v-for="product in products" :key="product.id">{{ product.title }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  async created() {
    try {
      const response = await this.$axios.get('/api/products');
      this.products = response.data;
    } catch (error) {
      console.error('Error fetching products', error);
    }
  },
};
</script>
