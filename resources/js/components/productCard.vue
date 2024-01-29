<template>
  <section style="padding-bottom: 15%; margin-left: -2%; box-sizing: border-box; ">
    <div class="bgdua">
      <div
        class="q-col-gutter-md q-px-lg q-mx-xl float-center col-12 col-md-8 col-sm-6"
        style="margin-top: 10px; background-size: cover;"
      >
        <div class="q-pa-md row item-start q-gutter-md rps">
          <q-card flat class="bg-transparent" style="width: 280px; height: auto;">
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">
                Futuristic & Classic
              </div>
            </q-card-section>

            <q-card-section class="q-p-xl q-pt-none">
              <div style="font-size: 14px">
                "Introducing a fusion of the future and timeless allure in our collection.
                Discover the perfect balance between futuristic innovation and classic
                elegance”
              </div>
            </q-card-section>
          </q-card>

          <q-card
            flat
            class="bg-transparent text-black"
            style="width: 240px; height: auto"
          >
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">Cool Design</div>
            </q-card-section>

            <q-card-section class="q-p-xl">
              <div style="font-size: 14px q-pt-none">
                "Immerse yourself in the world of innovation and style with our
                captivating cool designs”
              </div>
            </q-card-section>
          </q-card>

          <q-card flat class="bg-transparent" style="width: 240px; height: auto">
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">Luxury Materials</div>
            </q-card-section>

            <q-card-section class="q-p-xl q-pt-none">
              <div style="font-size: 14px">
                "Indulge in the opulence of our luxurious materials that redefine
                elegance.”
              </div>
            </q-card-section>
          </q-card>

          <q-card
            flat
            class="bg-transparent col-12 col-md-4"
            style="width: 240px; height: auto"
          >
            <q-card-section class="q-p-xl">
              <div style="font-size: 18px" class="text-weight-bold">High Quality</div>
            </q-card-section>

            <q-card-section class="q-p-xl q-pt-none">
              <div style="font-size: 14px">
                "Experience the essence of true craftsmanship with our high-quality,
                artisan-crafted bags”
              </div>
            </q-card-section>
          </q-card>
        </div>
      </div>
    </div>
  </section>

  <section id="newProduct" class="bgabtus" style="margin: 0 12%; padding-bottom: 7%">
    <div>
      <div class="judul">
        <div
          style="
            text-align: center;
            font-size: 40px;
            padding-top: 3%;
            padding-bottom: 3%;
            color: #fc6dab;
          "
          class="text-weight-bold"
        >
          Special For You
        </div>
      </div>
    </div>
    <div class="row q-gutter-md" style="justify-content: center">
      <q-card
        v-for="pp in pictProduct"
        :key="pp"
        style="max-width: 350px; padding: 10px; border-radius: 5px; flex: 1"
        class="shadow-1"
      >
        <img :src="'/storage/' + pp.picture" alt="" />

        <q-card-section>
          <q-btn
            fab
            color="white"
            icon="shopping_bag"
            class="absolute text-pink-5"
            style="top: 0; right: 5px; transform: translateY(-50%)"
          />
        </q-card-section>
      </q-card>
    </div>
    <div style="text-align: center; padding-top: 5%">
      <Link href="/product">
        <q-btn flat class="text-capitalize text-grey-6" style="font-size: 16px">
          See more..
        </q-btn>
      </Link>
    </div>
  </section>

  <section style="">
    <div class="">
      <div class="judul">
        <div
          style="text-align: center; font-size: 40px; padding-bottom: 3%; color: #fc6dab"
          class="text-weight-bold"
        >
          Contact Us
        </div>
      </div>

      <div style="margin: auto;  justify-content: space-between; align-items: center; text-align: center;">
        <div class="q-pa-md row items-start q-gutter-xl" style="justify-content: center">
          <!-- Card 1 -->
          <q-card flat class="bg-transparent" style="padding-right: 3%; max-width: 300px">
            <q-card-section horizontal>
              <img
                style="width: 65px; height: 80px; padding-top: 5%"
                src="../../../public/assets/img/1.jpg"
              />
              <div>
                <q-card-section class="q-p-xl">
                  <div style="font-size: 28px" class="text-weight-bold">Call Us</div>
                </q-card-section>

                <q-card-section class="q-p-xl q-pt-none">
                  <div style="font-size: 18px;  ">(+62) 81341691095</div>
                </q-card-section>
              </div>
            </q-card-section>
          </q-card>

          <!-- Card 2 -->
          <q-card
            flat
            class="bg-transparent text-black"
            style="padding-right: 3%; max-width: 450px"
          >
            <q-card-section horizontal>
              <img
                style="width: 75px; height: 90px; padding-top: 5%"
                src="../../../public/assets/img/3.jpg"
              />
              <div>
                <q-card-section class="q-p-xl">
                  <div style="font-size: 28px" class="text-weight-bold">
                    Our Instagram
                  </div>
                </q-card-section>

                <q-card-section class="q-p-xl q-pt-none">
                  <div style="font-size: 18px">@sticbag</div>
                </q-card-section>
              </div>
            </q-card-section>
          </q-card>

          <!-- Card 3 -->
          <q-card flat class="bg-transparent" style="max-width: 400px">
            <q-card-section horizontal>
              <img
                style="width: 75px; height: 90px; padding-top: 5%"
                src="../../../public/assets/img/2.jpg"
              />
              <div>
                <q-card-section class="">
                  <div style="font-size: 28px" class="text-weight-bold">Our Office</div>
                </q-card-section>

                <q-card-section class="q-pt-none">
                  <div style="font-size: 18px">Komp. Puri Taman Sari</div>
                </q-card-section>
              </div>
            </q-card-section>
          </q-card>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";

export default {
  setup() {
    const pictProduct = ref([]);
    function getPicture() {
      axios.get("/getPicture").then((res) => {
        pictProduct.value = res.data.pictProduct;
      });
    }
    onMounted(() => {
      getPicture();
    });
    return {
      pictProduct,
    };
  },
};
</script>

<style>
.bgabtus {
  background-image: url("../../../public/assets/img/bgProduct.jpg");
  background-size: cover;
  padding: 10px;
  max-width: 100%;
}

.bgdua {
  background-image: url("../../../public/assets/img/bg 3.jpg");
  background-size: cover;
  max-width: 100%;
  
}
</style>
