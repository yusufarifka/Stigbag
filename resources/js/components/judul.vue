<template>
  <q-page style="width: 100%;">
    <div class="latar" >
      <div class="" style=" margin-top: 0;background-size: cover;" >
        <div class="" style="padding-top: 9%;padding-bottom: 16%;">
          <div class="" style="padding-left: 10%;">

            <div class="judul">
            <div class="text-weight-bold text-italic q-pb-md judul-text " style="color: #fc6dab;font-size: 6vw;text-shadow: #ffffff;">
              <span style="font-size: 4vw; padding-top: 0;color: #ffffff;">Anything about</span>  Beads
            </div>
            </div>
            <div class="text-weight-medium  q-pb-xl subtitle-text " style="color: #ffffff;font-size: 2vw;">
                Look adorable with cute Beaded Bag,  <br>  Wallet, Strap Bag, and Lighter Case.
            </div>

            <q-btn color="white" rounded outline class="text-white">Order Now</q-btn>
          </div>
        </div>
      </div>
        </div>
  </q-page>

   <!-- fitur -->
  <section style="margin: auto; max-width: 80%; padding-top: 10%; margin-bottom:200px;" id="aboutUs">
  <!-- about us -->
  <div class="responsive-text row" style="padding-bottom: 8%;">
    <div class="rounded col text-center">
      <img src="../../../public/assets/img/pp.png" style="width: 100%; max-width: 100%;" alt="" />
    </div>
    <q-card-section class="col text-center" style="padding-top: 7%;">
      <div class="judul">
        <p class="text-left text-weight-bold" style="color:#fc6dab; font-size: 4vw;">
          About Us
        </p>
      </div>
      <p class="text-left q-pt-lg text-weight-regular responsive-text" style="font-size: 2vw; text-align: justify; max-width: 550px;">
        Sticbag has been established since 2021 as an independent business producing handicraft products from beads. Sticbag produces goods such as bags, wallets, bag straps, and lighter holders.
      </p>
    </q-card-section>
  </div>
</section>

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
.responsive-text {
    font-size: 4vw; /* Gunakan vw (viewport width) untuk ukuran font responsif */
    max-width: 100%; /* Hindari teks melebihi lebar parent */
    text-align: center;
  }

  @media (min-width: 1100px) {
    /* Gunakan media query untuk ukuran layar yang lebih besar */
    .responsive-text {
      font-size: 20px; /* Ukuran font tetap untuk layar lebar */
    }

      .judul-text {
        font-size: 60px;
      }

      .subtitle-text {
        font-size: 20px;
      }
    }
.judul {
    font-family: 'Playfair Display', serif;
      }
.latar {
  background-image: url("../../../public/assets/img/bg.jpg") !important;
  background-size: cover;
  z-index: -1;
  max-width: 100%;
  
}

</style>
