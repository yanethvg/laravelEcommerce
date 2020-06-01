<template>
  <button @click="addToCart" class="btn btn-primary">{{message}}</button>
</template>

<script>
  export default {
    data(){
      return {
        message: 'Agregar al carrito',
        endpoint: '/in_shopping_carts'
      }
    },
    props: { product: { type: Object } },
    methods:{
      addToCart(){
        axios({
          method: 'POST',
          url: this.endpoint,
          data: {
            product_id: this.product.id
          },
          headers: {
            'Accept':'application/json',
            'Content-Type': 'application/json'
          }
        }).then(()=>{
         window.store.commit("increment");
         //console.log('Se agrego el producto');
        })
      }
    }
  }
</script>
