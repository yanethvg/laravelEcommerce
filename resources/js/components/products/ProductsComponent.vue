<template >
  <section>
    <material-transition-group tag="div"  class="row">
      <product-card-component :key="product.id" :data-index="index" v-bind:product="product" v-for="(product,index) in products"> </product-card-component>
    </material-transition-group>
  </section>

</template>


<script>
  export default {
    data(){
      return {
        name: 'Products Component v2',
        products: [],
        endpoint: "/products"
      }
    },
    created(){
      this.fetchProducts();
    },
    methods: {
      fetchProducts(){
        axios.get(this.endpoint).then((response)=>{
          console.log(response.data.data);
          this.products = response.data.data;
        });
      }
    }
  }
</script>
