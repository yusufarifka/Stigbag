<template>
    <q-page class="q-pa-lg ">
        <div class="q-mx-lg" style="max-width:1300px;margin:0 auto;">
            <div class="row q-col-gutter-md">
                <!-- kolom 1 -->
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">   <!-- responsibility (ukuran) -->
                    <q-card flat> <!-- flat agar tidak ada bayangan -->
                        <img src="https://cdn.quasar.dev/img/mountains.jpg" alt="">
                        <q-card-section>
                            <div class="text-h6">Ini Judul</div>
                            <div>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla animi eaque molestiae odio,
                                laboriosam reiciendis vitae dicta optio et placeat quae omnis voluptatibus voluptatum,
                                eum explicabo suscipit fuga ea eos tempora autem quia vero quibusdam iusto? Iure voluptas
                            </div>
                        </q-card-section>
                    </q-card>
                </div>

                <!-- kolom 2 -->
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">   <!-- responsibility (ukuran) -->
                    <q-list>
                        <q-item class="q-mb-md">
                            <q-item-section thumbnail top>
                                <img src="https://cdn.quasar.dev/img/mountains.jpg" alt="">
                            </q-item-section>

                            <q-item-section>
                                <q-item-label>Ini Judul Berita</q-item-label>
                                <q-item-label section>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reiciendis minima placeat
                                    eos at natus quod. Fugit natus perferendis illo.
                                </q-item-label>
                                <span class="text-grey">
                                    28 Agustus 2023 - Admin
                                </span>
                            </q-item-section>
                        </q-item>

                        <q-item class="q-mb-md">
                            <q-item-section thumbnail top>
                                <img src="https://cdn.quasar.dev/img/mountains.jpg" alt="">
                            </q-item-section>

                            <q-item-section>
                                <q-item-label>Ini Judul Berita</q-item-label>
                                <q-item-label section>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reiciendis minima placeat
                                    eos at natus quod. Fugit natus perferendis illo.
                                </q-item-label>
                            </q-item-section>
                        </q-item>

                        <q-item class="q-mb-md">
                            <q-item-section thumbnail top>
                                <img src="https://cdn.quasar.dev/img/mountains.jpg" alt="">
                            </q-item-section>

                            <q-item-section>
                                <q-item-label>Ini Judul Berita</q-item-label>
                                <q-item-label section>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reiciendis minima placeat
                                    eos at natus quod. Fugit natus perferendis illo.
                                </q-item-label>
                            </q-item-section>
                        </q-item>
                    </q-list>
                </div>

                <!-- kolom 3 -->
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">   <!-- responsibility (ukuran) -->
                    <q-list>
                        <q-item>
                            <span class="text-h6">Trending</span>
                        </q-item>

                        <q-separator/>

                        <q-item>
                            <q-item-section>
                                <q-item-label class="text-h6">Ini Judul</q-item-label>
                                <q-item-label caption>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam labore porro ipsum esse harum sit nesciunt culpa, nulla aperiam vero!
                                </q-item-label>
                            </q-item-section>
                        </q-item>

                        <q-item>
                            <q-item-section>
                                <q-item-label class="text-h6">Ini Judul</q-item-label>
                                <q-item-label caption>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam labore porro ipsum esse harum sit nesciunt culpa, nulla aperiam vero!
                                </q-item-label>
                            </q-item-section>
                        </q-item>
                    </q-list>
                </div>
            </div>
        </div>
    </q-page>
</template>
<script>
import layout from "../layout/layout.vue"

export default{
layout:layout
}
</script>
