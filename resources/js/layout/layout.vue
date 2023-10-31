<template>
  <q-layout view="hHh LpR fFf">

    <!-- HEADER -->
    <q-header class="gradient-header">

      <q-toolbar>
        <q-btn v-if="$page.props.auth.user" dense flat round icon="menu" @click="toggleLeftDrawer" />

        <q-toolbar-title style="font-style: italic; font-weight: bold; font-size: 33px;">
          SticBag
        </q-toolbar-title>
        <q-space />
        <q-tabs inline-label class=" text-dark">


          <!-- TOOLS LINK -->
          <Link href="/" as="q-tab" style="color: #fff; font-size: 18;">
          <q-tab name="home" label="Home" icon="home" />
          </Link>
          <Link href="/products" as="q-tab" style="color: #fff; font-size: 18;">
          <q-tab name="products" label="Products"  />
          </Link>
          <Link href="/" as="q-tab" style="color: #fff; font-size: 18;">
          <q-tab name="more" label="More"/>
          </Link>
          <Link href="/" as="q-tab" style="color: #fff; font-size: 18;">
          <q-tab name="about us" label="About us"  />
          </Link>
          <Link href="/Profile" as="q-tab" style="color: #fff; font-size: 18;">
          <q-tab name="profile" label="Profile" icon="account_circle" />
          </Link>
          <q-tab v-if="$page.props.auth.user" style="color: white; font-size: 18;" name="logout" label="Logout" @click="logout"
            icon="login" />
          <q-tab v-else name="login" style="color: white; font-size: 18;" label="Login" @click="dialogLogin = true" icon="login" />
        </q-tabs>
      </q-toolbar>

    </q-header>


    <q-drawer v-if="$page.props.auth.user" show-if-above v-model="leftDrawerOpen" side="left" bordered class="tlbc" style="width: 100px;">
      <!-- drawer content -->
      <q-list class="q-mt-md">
        <Link href="/dashboard" as="q-item" style="color: black;">
        <q-item clickable v-ripple>
          <q-item-section avatar>

          </q-item-section>

          <q-item-section style="font-size: 150%;">Dashboard</q-item-section>
        </q-item>
        </Link>
      </q-list>

      <q-list class="q-mt-md">
        <Link href="/user" as="q-item" style="color: black;">
        <q-item clickable v-ripple>
          <q-item-section avatar>

          </q-item-section>

          <q-item-section style="font-size: 150%;">User</q-item-section>
        </q-item>
        </Link>
      </q-list>

      <q-list class="q-mt-md">
        <Link href="/products" as="q-item" style="color: black;">
        <q-item clickable v-ripple>
          <q-item-section avatar>

          </q-item-section>

          <q-item-section style="font-size: 150%;">Products</q-item-section>
        </q-item>
        </Link>
      </q-list>

      <q-list class="q-mt-md">
        <Link href="/orders" as="q-item" style="color: black;">
        <q-item clickable v-ripple>
          <q-item-section avatar>

          </q-item-section>

          <q-item-section style="font-size: 150%;">Orders</q-item-section>
        </q-item>
        </Link>
      </q-list>
    </q-drawer>

    <q-page-container>
      <slot />
    </q-page-container>


    <!-- DIALOG -->
    <q-dialog persistent v-model="dialogLogin">

      <q-card style="width:700px">
        <q-toolbar>
          <q-toolbar-title v-if="!reg">LOGIN</q-toolbar-title>
          <q-toolbar-title v-else>REGISTER</q-toolbar-title>
          <q-space />
          <span v-if="status.length" class="text-gray q-ml-lg"> {{ status }} </span>
          <q-btn round icon="cancel" @click="dialogLogin = false" color="grey-2" text-color="dark" unelevated dense />
        </q-toolbar>

        <q-card-section>

          <!-- LOGIN -->
          <q-form v-if="!reg" class="q-gutter-sm">
            <q-input outlined label="username" v-model="form.username">
              <template v-slot:prepend>
                <q-icon name="person" />
              </template>
            </q-input>
            <q-input outlined label="password" type="password" v-model="form.password">
              <template v-slot:prepend>
                <q-icon name="lock" />
              </template>
            </q-input>


            <div>
              <q-btn @click="login" label="login" style="width:100%" color="purple" />
            </div>
            <div>
              <span @click="ubah">Register</span>
            </div>
          </q-form>

          <!-- REGISTER -->
          <q-form v-if="reg" class="q-gutter-sm">
            <q-input :hint="errors.name" outlined label="name" v-model="register.name">
              <template v-slot:prepend>
                <q-icon name="person" />
              </template>
            </q-input>
            <q-input :hint="errors.username" outlined label="username" v-model="register.username">
              <template v-slot:prepend>
                <q-icon name="person" />
              </template>
            </q-input>
            <q-input :hint="errors.password" outlined label="password" type="password" v-model="register.password">
              <template v-slot:prepend>
                <q-icon name="lock" />
              </template>
            </q-input>
            <q-input :hint="errors.email" outlined label="email" v-model="register.email">
              <template v-slot:prepend>
                <q-icon name="mail" />
              </template>
            </q-input>
            <div class="text-right">
              <q-btn label="register" @click="registerSave" color="blue" />
              <q-btn label="login" color="purple" @click="reg = false" class="q-ml-sm" />
            </div>
          </q-form>
        </q-card-section>
      </q-card>

    </q-dialog>

  </q-layout>
</template>



<script>
import { ref, reactive } from 'vue'
import { router } from '@inertiajs/vue3'

export default {
  props: {
    errors: Object
  },
  setup() {
    const leftDrawerOpen = ref(false)
    const dialogLogin = ref(false)
    const status = ref("")
    const form = reactive({
      username: "",
      password: ""
    })
    const register = reactive({
      name: "",
      username: "",
      password: "",
      email: ""
    })
    const reg = ref(false)
    function ubah() {
      reg.value = true
    }
    function registerSave() {
      router.visit('/register', {
        method: 'post',
        data: {
          name: register.name,
          username: register.username,
          password: register.password,
          email: register.email,
        },
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
          register.name = ""
          register.username = ""
          register.password = ""
          register.email = ""
          status.value = "berhasil disimpan"
        }
      })
    }
    function login() {
      router.post("/login", form)

      //menghilangkan popup setelah login
      dialogLogin.value = false;
    }
    function logout() {
      router.get("/logout")
    }

    return {
      logout,
      login,
      status,
      registerSave,
      register,
      ubah,
      reg,
      form,
      dialogLogin,
      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
}
</script>

<style>
.gradient-header {
  height: 77px;
  background: linear-gradient(#C04CFD, #FC6DAB, #FCFBE8);
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
  display: flex;
  justify-content: center;
  align-items: center;

}

.tlbc {
  background-color: rgba(255, 109, 171, 20%);
  color: white;
}
</style>