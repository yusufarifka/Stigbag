<template>
  <q-layout view="hHh LpR fFf">
    <!-- HEADER -->
    <q-header class="shadow-1"  style="background-color: #ffffff;">
      <q-toolbar class="q-px-lg" style="padding-left: 10%; padding-right: 10%;">
        <q-btn
          v-if="$page.props.auth.user"
          dense
          flat
          round
          style="color: #fc6dab;"
          icon="menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title
        >
          <img style="width: 50px;" src="../../../public/assets/img/stibagLogo.png" alt="">
        </q-toolbar-title >
        <q-space />
        <q-tabs inline-label class="text-dark ">
          <!-- TOOLS LINK -->
          <Link href="/" as="q-tab" style="color: #fc6dab; font-size: 18;">
            <q-tab name="home" class="text-capitalize q-mx-md" label="Home" />
          </Link>
          <Link href="/product" as="q-tab" style="color: #fc6dab; font-size: 18">
            <q-tab name="product"  class="text-capitalize q-mx-md" label="Product" />
          </Link>

          <q-btn
          flat
            rounded
            outlined
            v-if="$page.props.auth.user"
            style="width:100px;color: #ffffff; background-color:#fc6dab; font-size: 18"
            name="logout"
            label="Log out"
            @click="logout"
            class="text-capitalize q-ml-md"
          />
        </q-tabs>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-if="$page.props.auth.user"
      show-if-above
      v-model="leftDrawerOpen"
      side="left"
      bordered
      class="tlbc "
      style="width: 100px;background-color: #ffffff;"
    >
      <!-- drawer content -->
      <q-list class="q-mt-md q-ml-md">
        <q-item as="q-item">
            <q-item-section style="font-size: 18px;" class="text-weight-bold text-black">Menu</q-item-section>
        </q-item>
      </q-list>

      <q-list class=" q-mx-md">
        <Link href="/admin/dashboard" as="q-item" style="color: black">
          <q-item clickable v-ripple>
            <q-item-section avatar>
                <q-icon name="home" color="pink-2"/>
            </q-item-section>

            <q-item-section style="font-size: 18px" class="text-weight-regular">Dashboard</q-item-section>
          </q-item>
        </Link>
      </q-list>

      <q-list class=" q-mx-md">
        <Link href="/admin/user" as="q-item" style="color: black">
          <q-item clickable v-ripple>
            <q-item-section avatar>
                <q-icon name="people" color="pink-2"/>
            </q-item-section>

            <q-item-section style="font-size: 18px" class="text-weight-regular">Admin</q-item-section>
          </q-item>
        </Link>
      </q-list>

      <q-list class=" q-mx-md"  >

        <Link  href="/admin/products" as="q-item" style="color: black">
          <q-item clickable v-ripple>
            <q-item-section avatar>
                <q-icon name="inventory" color="pink-2"/>
            </q-item-section>

            <q-item-section   style="font-size: 18px" class="text-weight-regular">Products</q-item-section>
          </q-item>
        </Link>
      </q-list>



    </q-drawer>

    <q-page-container>
      <slot />
    </q-page-container>

    <iniFooter />
  </q-layout>
</template>

<script>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import iniFooter from "../components/footer/iniFooter.vue"

export default {
  props: {
    errors: Object,
  },
  components:{
    iniFooter
  },
  setup() {
    const leftDrawerOpen = ref(false);

    function logout() {
      router.get("/logout");
    }

    return {
      logout,
      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value;
      },
    }
  }
}
</script>

<style>
/* .gradient-header {
  height: 77px;
  background: linear-gradient(#C04CFD, #FC6DAB, #FCFBE8);
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
  display: flex;
  justify-content: center;
  align-items: center;

} */

/* .tlbc {
  background-color: rgba(255, 109, 171, 20%);
  color: white;
} */
</style>
