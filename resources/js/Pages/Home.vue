<template>
  <q-page>
    <section>
      <judul />
    </section>

    <section>
      <productCard />
    </section>
  </q-page>
</template>
<script>
import layout from "../layout/layout.vue";
import judul from "../components/judul.vue";
import productCard from "../components/productCard.vue";

export default {
  layout: layout,
  components: {
    judul,
    productCard,
  },
};
</script>

<style></style>
