<template>
    <q-page class="q-pl-md">
        <div-class style="display: flex; justify-content: space-between; align-items: center; height: 100px; ">
            <h3>Orders</h3>
            <!-- <q-btn @click="dialogUser = true" label="tambah product" class="q-mr-md" icon="add" color="primary"  /> -->
        </div-class>
        
        <q-markup-table border separator="cell" class="q-ma-md" >
            <thead>
                <tr>
                    <th style="border: 1px solid #000;">NO</th>
                    <th style="border: 1px solid #000;">Username</th>
                    <th style="border: 1px solid #000;">Product Name</th>
                    <th style="border: 1px solid #000;">Custom</th>
                    <th style="border: 1px solid #000;">Address</th>
                    <th style="border: 1px solid #000;">Receipt</th>
                    <th style="border: 1px solid #000;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in data" :key="index++">
                    <td style="border: 1px solid #000;">{{ index }}</td>
                    <td style="border: 1px solid #000;">{{ row.name }}</td>
                    <td style="border: 1px solid #000;">{{ row.username }}</td>
                    <td style="border: 1px solid #000;">        
                        <q-btn @click="konfirmasi(row.id)" unelevated label="Delete" color="red"  />
                        <q-btn @click="edit(row.id)" unelevated label="Edit" color="teal" class="q-mx-xs" />
                    </td>
                </tr>
            </tbody>
        </q-markup-table>
    </q-page>
    <!-- <q-dialog v-model="dialogUser">
        <q-card flat style="width: 700px">
            <q-toolbar>
                <q-toolbar-tittle>Add products</q-toolbar-tittle>
                <q-space />
                <q-btn round flat icon="cancel" color="pink" @click="batal" />
            </q-toolbar>
            <q-card-section>
                <q-form class="q-gutter-sm">
                    <q-input label="Product name" v-model="form.product_name" />
                    <q-input label="Product description" v-model="form.product_description" />
                    <q-input label="Price" v-model="form.price" />
                    <q-input label="Gambar" v-model="form.picture" />
                    <div>
                        <q-btn @click="simpan" class="q-mr-sm" label="simpan" icon="save" color="primary" />
                        <q-btn @click="batal" label="batal" icon="cancel" color="grey-2" text-color="dark" />
                    </div>
                </q-form>
            </q-card-section>
        </q-card>
    </q-dialog> -->

    <!-- <q-dialog v-model="dialogKonfirm">
        <q-card style="width=500px">
            <q-card-section>
                <p>Yakin mau hapus data ini?</p>
                <div>
                    <q-btn label="Ya, hapus" @click="hapus" color="red" />
                    <q-btn label="Jangan dong" @click="dialogKonfirm = false" class="q-mx-xs" />
                </div>
            </q-card-section>
        </q-card>
    </q-dialog> -->



</template>
<script>
import Layout from '../layout/layout.vue'
import { ref, reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import axios from 'axios'  //memangggil hubungan front end dan back end dan untuk get data

export default {
    layout: Layout,
    props: {
        data: Array
    },
    setup() {
        const dialogUser = ref(false)
        const dialogKonfirm = ref(false)
        const form = reactive({
            id: "",
            name: "",
            username: "",
            password: "",
            email: "",
        })
        function batal() {
            form.id = ""
            form.name = ""
            form.username = ""
            form.password = ""
            form.email = ""
            dialogUser.value = false
        }
        function simpan() {
            router.visit('/user/simpan', {
                method: 'post',
                data: {
                    id: form.id,
                    name: form.name,
                    username: form.username,
                    password: form.password,
                    email: form.email,
                },
                preserveScroll: true,
                preserveState: true,
                onSuccess: () => {
                    dialogUser.value = false
                }
            })
        }
        function edit(id) {
            axios.get('/user/edit/' + id).then((res) => {
                form.id = res.data.id
                form.name = res.data.name
                form.username = res.data.username
                form.email = res.data.email
                dialogUser.value = true
            })
        }
        function konfirmasi(id) {
            form.id = id
            dialogKonfirm.value = true
        }
        function hapus() {
            router.visit('/user/hapus/' + form.id, {
                method: 'delete',
                preserveScroll: true,
                preserveState: true,
                onSuccess: () => {
                    dialogKonfirm.value = false
                }
            })
        }
        return {
            hapus,
            konfirmasi,
            edit,
            simpan,
            batal,
            form,
            dialogUser,
            dialogKonfirm

        }
    }

}
</script>
