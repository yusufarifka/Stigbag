<template>
    <q-page class="q-px-lg"  style="padding-top: 0;background-color: #fdf3f7;">
    <div class="q-py-lg">
        <div class="bg-white shadow-1 q-px-lg q-pb-lg" style="border-radius: 6px;">

        <div style="display: flex; justify-content: space-between; align-items: center; height: 100px; ">
            <h4 class="text-weight-medium">Admin</h4>

            <q-btn
            @click="dialogUser = true"
        icon="add"
        label="add account"
        class="text-capitalize text-weight-medium"
        style="font-size: 16px;color: #fc6dab; background-color: #ffffff;"
      />
        </div>

        <q-markup-table flat bordered separator="cell"  >
            <thead style="background-color: #6dfc93;color: white;">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th style="width: 200px;">Name</th>
                    <th style="width: 200px;">Username</th>
                    <th style="width: 250px;">Email</th>
                    <th style="width: 20px;" >Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in data" :key="index++">
                    <td>{{ index }}</td>
                    <td>{{ row.name }}</td>
                    <td>{{ row.username }}</td>
                    <td>{{ row.email }}</td>
                    <td class="text-center">
                        <q-btn @click="konfirmasi(row.id)" unelevated label="Delete" color="grey" style="border-radius: 30px;"/>
                        <q-btn @click="edit(row.id)" unelevated label="Edit" color="purple" class="q-mx-xs" style="border-radius: 30px;"/>
                    </td>
                </tr>
            </tbody>
        </q-markup-table>

    </div>
    </div>
    </q-page>

    <q-dialog v-model="dialogUser">
        <q-card flat style="width: 700px">
            <q-toolbar>
                <q-toolbar-title  style="color: #fc6dab" icon="" class="text-weight-bold">New Account</q-toolbar-title>
                <q-space />
                <q-btn round flat icon="cancel" color="grey-7" @click="batal" />
            </q-toolbar>
            <q-card-section>
                <q-form class="q-gutter-sm">
                    <p>Name</p>
                    <q-input outlined rounded  v-model="form.name" />
                    <p>Username</p>
                    <q-input outlined rounded v-model="form.username" />
                    <p>Password</p>
                    <q-input outlined rounded  v-model="form.password" />
                    <p>E-mail</p>
                    <q-input outlined rounded v-model="form.email" />
                    <div class="q-my-md q-gutter-sm float-right">
                        <q-btn
                            @click="simpan"
                            class="text-capitalize"
                            flat
                            rounded
                            label="save"
                            style="width: 100px; background-color: #c04cfd; color: white"
                            unelevated
                            dense/>
                    </div>
                </q-form>
            </q-card-section>
        </q-card>
    </q-dialog>

    <q-dialog v-model="dialogKonfirm">
        <q-card style="width=500px">
            <q-card-section>
                <p>Yakin mau hapus data ini?</p>
                <div>
                    <q-btn label="Ya, hapus" @click="hapus" color="red" />
                    <q-btn label="Jangan dong" @click="dialogKonfirm = false" class="q-mx-xs" />
                </div>
            </q-card-section>
        </q-card>
    </q-dialog>
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
