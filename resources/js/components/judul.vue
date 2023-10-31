<template>
  <q-page style="width: 100%">
    <div class="latar">
      <div class="q-mx-xl" style="width: 1100px; height: 670px; margin-top: 0">
        <div class="row q-col-gutter-md" style="padding-top: 8%">
          <div class="col-12 col-sm-10 col-md-12 col-lg-12" style="margin-left: 10%">
            <h3 class="text-weight-bolder" style="color: #fcfbeb">
              DISCOVER THE EPITOME <br />
              OF ELEGANCE AND <br />
              HANDCRAFTED BAGS.
            </h3>
            <h6 class="text-weight-regular" style="color: #fcfbeb">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              <br />
              sed do eiusmod tempor
            </h6>
            <q-btn color="white" rounded outline class="text-white">Order Now</q-btn>
          </div>
        </div>
      </div>
    </div>

    <!-- fitur -->
  </q-page>
  <q-page>
    <div class="bgdua">
      <div
        class="q-col-gutter-md q-px-lg q-mx-xl float-center"
        style="margin: auto; width: 1100px"
      >
        <div class="q-pa-md row items-start q-gutter-md">
          <q-card class="bg-black text-white" style="width: 240px; height: auto">
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">
                Futuristic & Classic
              </div>
            </q-card-section>

            <q-card-section class="q-p-xl">
              <div style="font-size: 14px">
                "Introducing a fusion of the future and timeless allure in our collection.
                Discover the perfect balance between futuristic innovation and classic
                elegance”
              </div>
            </q-card-section>
          </q-card>

          <q-card class="bg-black text-white" style="width: 240px; height: auto">
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">Cool Design</div>
            </q-card-section>

            <q-card-section class="q-p-xl">
              <div style="font-size: 14px">
                "Immerse yourself in the world of innovation and style with our
                captivating cool designs”
              </div>
            </q-card-section>
          </q-card>

          <q-card class="bg-black text-white" style="width: 240px; height: auto">
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">Luxury Materials</div>
            </q-card-section>

            <q-card-section class="q-p-xl">
              <div style="font-size: 14px">
                "Indulge in the opulence of our luxurious materials that redefine
                elegance.”
              </div>
            </q-card-section>
          </q-card>

          <q-card class="bg-black text-white" style="width: 240px; height: auto">
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">High Quality</div>
            </q-card-section>

            <q-card-section class="q-p-xl">
              <div style="font-size: 14px">
                "Experience the essence of true craftsmanship with our high-quality,
                artisan-crafted bags”
              </div>
            </q-card-section>
          </q-card>
        </div>
      </div>
    </div>

    <!-- about us -->
    <div style="">
      <div class="q-mx-xl" style="margin-top: 0; padding: 5%">
        <div class="row">
          <div class="rounded col text-center">
            <img src="../../../public/assets/img/bg.jpg" style="width: 90%" alt="" />
          </div>
          <q-card-section class="col text-center">
            <p class="text-left text-weight-bold" style="color: #fc6dab; font-size: 46px">
              We Provide The <br />
              Best Bags For you.
            </p>
            <p class="text-left" style="font-size: 16px">
              "We take immense pride in meticulously crafting the finest and most classic
              handcrafted bags exclusively for you.
              <br />
              <br />
              Our dedication to timeless design and expert craftsmanship ensures that each
              piece we create is not just a bag, but a work of art that reflects your
              impeccable taste."
            </p>
          </q-card-section>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    return {
      alert: ref(false),
    };
  },
};
</script>

<style>
.latar {
  background-image: url("../../../public/assets/img/bg.jpg") !important;
  background-size: cover;
  padding: 0;
  z-index: -1;
}
.bgdua {
  /* background-image: url('../../../public/assets/img/bg'); */
  background-color: black;
}
</style>
