<template>
    <div bordered class="text-primary  bg">
        <h4 align="center" class="text-weight-bolder judul q-pt-lg" style="color: #ffffff;">Sticbag</h4>
        <q-tabs no-caps xactive-color="primary" indicator-color="transparent">
            <div class="row responsive-tabs" style="color: #ffffff;" >
                <div class="col-12 col-md-4 q-px-xl">
                    <Link href="#aboutUs" style="text-decoration: none;">
                        <q-tab flat label="About Us" style="color: #ffffff;font-size: 26px;text-decoration: none;" />
                    </Link>
                    <Link href="#newProduct" style="text-decoration: none;" >
                        <q-tab flat label="New Product" style="color: #ffffff;" />
                    </Link>
                    <Link href="#3" style="text-decoration: none;">
                        <q-tab flat  label="Contact" style="color: #ffffff;" />
                    </Link>
                </div>
                <div class="col-12 col-md-4 q-px-xl">
                    <Link href="/" style="text-decoration: none;" >
                        <q-tab flat label="Home" style="color: #ffffff;font-size: 26px;" no-underline />
                    </Link>
                    <Link href="/product" style="text-decoration: none;">
                        <q-tab flat label="Product" style="color: #ffffff;font-size: 26px;" no-underline />
                    </Link>
                    <!-- <div @click="adminLogIn=true"> -->
                        <q-tab label="Admin"  class="flat"   @click="dialogLogin = true" />
                    <!-- </div> -->

                </div>
                <div class="col-12 col-md-4 q-px-xl ">
                    <q-tab  label="BagSecure Solution" />
                    <q-tab  label="SMK Telkom Makassar" />
                    <q-tab  label="Jl. A.P Pettarani" />
                </div>

            </div>
        </q-tabs>
    </div>

    <q-dialog v-model="dialogLogin">
      <q-card style="width: 700px">
        <q-toolbar>
          <q-toolbar-title v-if="!reg" style="color: #fc6dab" class="text-weight-bold"
            >Log In to Your Account</q-toolbar-title
          >
          <q-toolbar-title v-else style="color: #fc6dab" class="text-weight-bold"
            >Create Account</q-toolbar-title
          >
          <q-space />
          <span v-if="status.length" class="text-gray q-ml-lg"> {{ status }} </span>
          <q-btn
            round
            icon="cancel"
            @click="dialogLogin = false"
            color="grey-2"
            text-color="dark"
            unelevated
            dense
          />
        </q-toolbar>

        <q-card-section>
          <!-- LOGIN -->
          <q-form v-if="!reg" class="q-gutter-sm">
            <p>Username</p>
            <q-input outlined rounded v-model="form.username" style="border-color: black">
            </q-input>
            <p>Password</p>
            <q-input outlined rounded type="password" v-model="form.password"> </q-input>

            <div class="q-my-md q-gutter-sm float-right">
              <q-btn
                class="text-capitalize"
                flat
                rounded
                @click="ubah"
                label="Register"
                style="width: 100px; background-color: #aeaeae; color: white"
              />
              <q-btn
                class="text-capitalize"
                flat
                rounded
                @click="login"
                label="Log In"
                style="width: 100px; background-color: #c04cfd; color: white"
              />
            </div>
          </q-form>

          <!-- REGISTER -->
          <q-form v-if="reg" class="q-gutter-sm">
            <p>Name</p>
            <q-input outlined rounded v-model="register.name">
            </q-input>

            <p>Username</p>
            <q-input outlined rounded v-model="register.username">
            </q-input>

            <p>Password</p>
            <q-input
              outlined
              rounded
              type="password"
              v-model="register.password"
            >
            </q-input>
            <!-- :hint="errors.email" -->
            <p>Email</p>
            <q-input  outlined rounded v-model="register.email">
            </q-input>

            <div class="q-my-md q-gutter-sm float-right">
              <q-btn
                class="text-capitalize"
                flat
                rounded
                @click="reg = false"
                label="Log In"
                style="width: 100px; background-color: #aeaeae; color: white"
              />
              <q-btn
                class="text-capitalize"
                flat
                rounded
                @click="registerSave"
                label="Register"
                style="width: 100px; background-color: #c04cfd; color: white"
              />
            </div>
          </q-form>
        </q-card-section>
      </q-card>
    </q-dialog>

</template>
<script>
import { ref, reactive } from "vue";
import { router } from "@inertiajs/vue3";

export default {
  props: {
    errors: Object,
  },
  setup() {
    const dialogLogin = ref(false)
    const status = ref("")
    const reg = ref(false)
    const form = reactive({
      username: "",
      password: "",
    })
    const register = reactive({
      name: "",
      username: "",
      password: "",
      email: "",
    })

    function ubah() {
      reg.value = true;
    }
    function registerSave() {
      router.visit("/register", {
        method: "post",
        data: {
          name: register.name,
          username: register.username,
          password: register.password,
          email: register.email,
        },
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
          register.name = "";
          register.username = "";
          register.password = "";
          register.email = "";
          status.value = "berhasil disimpan";
        },
      });
    }
    function login() {
      router.post("/login", form);

      //menghilangkan popup setelah login
      dialogLogin.value = false;
    }

    return {
      login,
      status,
      registerSave,
      register,
      ubah,
      reg,
      form,
      dialogLogin,
    }
  }
}
</script>
<style>
  .responsive-tabs {
      display: flex;
      flex-wrap: wrap;
    }

    .col-12 {
      flex: 0 0 100%;
      max-width: 100%;
    }

    /* Media query untuk layar berukuran lebih kecil dari 768px */
    @media (max-width: 767px) {
      .col-12 {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }
.bg {
    background-image: url('../../../../public/assets/img/bg2.png');
}</style>
