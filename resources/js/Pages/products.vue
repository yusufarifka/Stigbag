<template>
  <q-page class="q-px-lg" style="padding-top: 0;background-color: #fdf3f7;">
    <div class="">


    <div style="display: flex;justify-content: space-between;align-items: center;height: 100px;">
      <h4 class="text-weight-bold">Products</h4>
      <q-btn flat
        @click="addProduct = true"
        label="add product"
        class="text-capitalize text-weight-bold"
        style="font-size: 25px;color: #fc6dab;"
      />
    </div>
    <q-markup-table  separator="cell">
      <thead>
        <tr>
          <th style="width:50px">No</th>
          <th  style="width: 200px;">Product Name</th>
          <th >Description</th>
          <th  style="width: 100px;">Price</th>
          <th >Picture</th>
          <th style="width:50px">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(row, index) in products" :key="index++">
          <td class="text-center" >{{ index }}</td>
          <td class="text-center" >{{ row.product_name }}</td>
          <td  v-html="row.product_desc"></td>
          <td class="text-center" >{{ row.price }}</td>
          <td >
            <q-img :src="'/storage/'+row.picture"></q-img>
        </td>
          <td class="text-center">
            <q-btn flat round style="">
                <q-icon name="more_vert">
                    <q-menu>
                        <q-list  dense>
                            <q-item clickable v-close-popup @click="pictAdd(row.id)">
                                <q-item-section side>
                                    <q-icon name="upload"/>
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Upload</q-item-label>
                                </q-item-section>
                            </q-item>

                            <q-item clickable v-close-popup @click="productEdit(row.id)">
                                <q-item-section side>
                                    <q-icon name="edit"/>
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Edit</q-item-label>
                                </q-item-section>
                            </q-item>

                            <q-item clickable v-close-popup @click="productDel(row.id)">
                                <q-item-section side>
                                    <q-icon name="delete"/>
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Delete</q-item-label>
                                </q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </q-icon>
            </q-btn>
          </td>
        </tr>
      </tbody>
    </q-markup-table>

    </div>
</q-page>

    <q-dialog v-model="addProduct">
        <q-card flat style="width: 700px">
        <q-toolbar>
            <q-toolbar-title style="color: #fc6dab" icon="" class="text-weight-bold">Add products</q-toolbar-title>
            <q-space />
            <q-btn round flat icon="cancel" color="grey-7" @click="batal" />
        </q-toolbar>


        <q-card-section>
            <q-form class="q-gutter-sm">
                <p>Product Name</p>
                <q-input  outlined rounded v-model="form.product_name" />

                <p>Product Description</p>

                <q-editor min-height="5rem" v-model="form.product_desc"></q-editor>


                <p>Product Price</p>
                <q-input outlined rounded v-model="form.price" />
                <!-- <tr>
                <td>
                <q-img v-if="row.gambar" :src="/storage/ + row.gambar" />
                </td>

                <td>
                <q-btn>
                    <q-icon round name="expand_more" />
                    <q-menu>
                    <q-list dense>
                        <q-item clickable v-close-popup @click="inUpload(row.id)">
                        <q-item-section side>
                            <q-icon name="upload" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label> upload </q-item-label>
                        </q-item-section>
                        </q-item>
                    </q-list>
                    </q-menu>
                </q-btn>
                </td>
            </tr> -->

                <div class="q-my-md q-gutter-sm float-right">
                    <q-btn
                    class="text-capitalize"
                    flat
                    rounded
                    label="Save"
                    @click="simpan"
                    style="width: 100px; background-color: #c04cfd; color: white"
                    unelevated
                    dense
                    />
                </div>
            </q-form>
        </q-card-section>
        </q-card>
    </q-dialog>

    <q-dialog v-model="addPicture">
        <q-card style="width: 700px;">
        <q-toolbar>
            <q-toolbar-title style="color: #fc6dab" icon="" class="text-weight-bold">Add Picture</q-toolbar-title>
            <q-space/>
            <q-btn round flat icon="cancel" color="grey-7" @click="batal"/>
        </q-toolbar>

        <q-card-section>
            <q-form class="q-gutter-sm">
                <q-file label="Choose a File" v-model="filex.picture"
                @input="filex.picture=$event.target.files[0]"/>
            </q-form>

            <div class="q-my-md q-gutter-sm float-right">
                    <q-btn
                    class="text-capitalize"
                    flat
                    rounded
                    label="Save"
                    @click="savePict"
                    style="width: 100px; background-color: #c04cfd; color: white"
                    unelevated
                    dense
                    />
                </div>
        </q-card-section>
    </q-card>
    </q-dialog>

    <q-dialog v-model="delConfirm">
        <q-card flat>
            <q-toolbar>
                <q-toolbar-title
                style="color: #fc6dab"
                class="text-weight-regular">
                Are you sure want to delete this data?
            </q-toolbar-title>
            <div>
                <q-btn label="Yes, delete it" @click="hapus" color="red"/>
                <q-btn label="No" @click="delConfirm=false" class="q-mx-sm"/>
            </div>
            </q-toolbar>
        </q-card>
    </q-dialog>

</template>
<script>
import layout from "../layout/layout.vue"
import { ref, reactive } from "vue"
import { router, useForm} from "@inertiajs/vue3"
import axios from 'axios'; //memangggil hubungan front end dan back end dan untuk get data

export default {
  layout: layout,
  props: {
    products: Array
  },
  setup() {
    const delConfirm = ref(false)
    const addProduct = ref(false)
    const addPicture = ref(false)
    const data=ref([])
    const filex=useForm({
        picture:null
    })
    const form = reactive({
      id: "",
      product_name: "",
      product_desc: "",
      price: "",
    })

    function batal() {
      form.id = ""
      form.product_name = ""
      form.product_desc = ""
      form.price = ""
      addProduct.value = false
    }

    function simpan() {
      router.visit('/product/simpan', {
        method: 'post',
        data: {
          id:form.id,
          product_name:form.product_name,
          product_desc:form.product_desc,
          price:form.price,
        },
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
          batal();
        }
      });
    }
    function pictAdd(id){
        form.id=id
        addPicture.value=true
    }
    function savePict(){
        router.visit('/products/picture',{
            method:'post',
            data:{
                id:form.id,
                picture:filex.picture
            },
            forceFormData: true,
            preserveScroll: true,
            preserveState: true,
            onSuccess:()=>{
                batal();
            }
        })
    }
    function productEdit(id){
        axios.get('/products/edit/'+id).then((res)=>{
            form.id=res.data.id
            form.product_name=res.data.product_name
            form.product_desc=res.data.product_desc
            addProduct.value=true
        })
    }
    function productDel(id){
        form.id=id
        delConfirm.value=true
    }
    function hapus(){
        router.visit('/products/delete/'+form.id,{
            method:'delete',
            preserveScroll: true,
            preserveState: true,
            onSuccess:()=>{
                delConfirm.value=false
            }
        })
    }
    return {
      savePict,
      pictAdd,
      simpan,
      batal,
      productEdit,
      productDel,
      hapus,
      delConfirm,
      filex,
      data,
      form,
      addPicture,
      addProduct
    }
  }
}
</script>
