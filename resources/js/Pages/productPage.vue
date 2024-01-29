<template>
    <div >
        <div style="text-align: center;padding: 3% 0;" class="bg-pink-1" >
                <div style="font-size: 18px;" class="text-weight-bold  col-12 col-md-4">
                    Find your Favorite
                </div>
                <p style="width: 600px;font-size: 12px;text-align: center; margin: 0 auto;" class=" col-12 col-md-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ullam voluptates quasi sequi. Soluta consectetur corrupti natus at cupiditate fugiat, quidem blanditiis nisi vitae commodi delectus nesciunt culpa ullam cum!
                </p>
        </div>
        <q-page class="bg-white" style="padding: 0 11% 3% 11%">
        <div>
        <div class="text-weight-bold text-pink-4 judul" style="font-size: 27px;padding-top: 3%;">Our Products</div>
            <!-- <div style="padding: 0%;font-size: 18px;" class="text-grey-5 text-weight-medium">Find Your Favorite Product in SticBag</div> -->
                <div class="row q-gutter-md q-pt-lg" style="align-items: center;">

                    <q-card v-for="pr in dataProduct" :key="pr"
                        style="width: 280px;border-radius: 0;"
                        class="shadow-1 ">
                        <div class="container">
                        <div class="picture">
                            <img style="height: 300px;width: 280px;" :src="'/storage/'+pr.picture" alt="">
                        </div>

                        <div class="text" >
                            {{ pr.product_desc }}
                        </div>
                    </div>
                        <q-card-section>
                            <div class="text-weight-regular text-grey-5" style="font-size: 15px;">
                                {{ pr.product_type }}
                            </div>
                            <div class="text-weight-medium " style="font-size: 18px;">
                                {{ pr.product_name }}
                            </div>
                            <div class="text-weight-bold" style="font-size: 20px;padding-top: 13px;">
                            Rp. {{ pr.price }}
                            </div>

                                <q-btn
                                    @click="dialogOrder = true"
                                    fab
                                    color="white"
                                    icon="shopping_bag"
                                    class="absolute text-pink-5"
                                    style="top: 0; right: 10px; transform: translateY(-50%);"
                                    />
                        </q-card-section>
                    </q-card>
                </div>
            </div>
        </q-page>

        <q-dialog v-model="dialogOrder">
            <q-card style="width: 450px;height: 160px;">
                <q-toolbar>
                    <q-toolbar-title style="color: #fc6dab;" class="text-weight-bold">
                        Klik here to order
                    </q-toolbar-title>

                    <q-space />
                    <q-btn
                        round
                        icon="cancel"
                        @click="dialogOrder = false"
                        color="grey-2"
                        text-color="dark"
                        unelevated
                        dense
                    />
                </q-toolbar>
                <hr>

                <q-card-section>
                    <q-btn flat fab
                        style="background-color: #ffffff;color: #fc6dab;border: 1px solid #fc6dab;"
                        icon="link"
                        class="absolute">
                    </q-btn>
                </q-card-section>

                <q-space />

                <a :href="'https://wa.me/+621341691095'" target="_blank"   class="text-weight-bold" style="text-decoration: none;">
                    <!-- <q-btn>
                        whatsapp
                    </q-btn> -->
                <div style="font-size: 18px;padding-left: 20%;" class="text-weight-medium">https://wa.me/6281341691095</div>

                </a>

            </q-card>
        </q-dialog>
    </div>
</template>

<script>
import axios from "axios"
import layout from "../layout/layout.vue"
import { onMounted, ref } from "vue"

export default{
    layout:layout,

    setup(){
        const dialogOrder=ref(false)
        const dataProduct=ref([])
        function order(){
                window.location.href('https://google.com');
        }
        function getProduct(){
            axios.get('/getProduct').then((res)=>{
                dataProduct.value=res.data.dataProduct
            })
        }
        onMounted(() => {
            getProduct()
        })
        return{
            order,
            dialogOrder,
            dataProduct
        }
    }
}
</script>

<style>
.container{
    cursor: pointer;
    width: 280px;
    height: 300px;
    overflow: hidden;
}
.container:hover .text{
    visibility: visible;
}
.container:hover img{
    transform: scale(1.1);
}
.image img{
    transition: .1s ease;
}
.text{
    position: absolute;
    top: 0;
    left:0;
    background: #fff;
    width: 280px;
    height: 45px;
    display: flex;
    flex-direction: column;
    color: #000000;
    opacity: .5;
    visibility: hidden;
    transition: .1s ease;
    font-size: 20px;
    padding: 10px;
}
</style>
