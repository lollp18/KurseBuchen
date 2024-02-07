<?php 

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <style>

  </style>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>


  <div id="app">
    <header>
      <button @click="AnmeldenAufrufen()">Anmelden</button>
      <button @click="RegistrirenAufrufen()">Registriren</button>
    </header>
    <main>
      <div class="Login" v-if="Component.Anmelden">
        <form>
          <h1>Anmelden</h1>
          <input type="text" placeholder="Email" />
          <input type="text" placeholder="Passwort" />
          <button @click="Close()">X</button>
        </form>
      </div>
      <div class="Login" v-if="Component.Registriren">

        <form>
          <h1>Registriren</h1>
          <input v-model="this.Registriren.Name" type="text" placeholder="Name" />
          <input v-model="this.Registriren.Stufe" type="text" placeholder="Stufe" />
          <input v-model="this.Registriren.Email" type="text" placeholder="Email" />
          <input v-model="this.Registriren.Passwort" type="text" placeholder="Passwort" />
          <button @click.prevent="mRegistriren()">Konto Erstellen</button>
          <button @click="Close()">X</button>
        </form>
      </div>
      <div class="KursListe" v-if="Component.KursListe">

      </div>
    </main>
  </div>
  <script>
  const {
    createApp,
    ref
  } = Vue

  const app = createApp({
    data() {
      return {



        Component: {
          Anmelden: false,
          Registriren: false,
          KursListe: true,
        },
        Anmelden: {
          Email: undefined,
          Passwort: undefined
        },
        Registriren: {
          Name: undefined,
          Stufe: undefined,
          Email: undefined,
          Passwort: undefined,



        },

        Kurse: undefined,

      }


    },
    methods: {
      AnmeldenAufrufen() {

        this.Component.Anmelden = true
        this.Component.Registriren = false
        this.Component.KursListe = false

      },

      Close() {
        this.Component.Anmelden = false
        this.Component.Registriren = false
        this.Component.KursListe = true

      },
      RegistrirenAufrufen() {

        this.Component.Registriren = true
        this.Component.Anmelden = false
        this.Component.KursListe = false

      },

      async GetAllCurse() {

        const res = await axios.get("./Kurse.php")
        this.Kurse = res.data

      },
      async mAnmelden() {
        const res = await axios.post("http://localhost/?Anmelden")

      },
      async mRegistriren() {
        const RegData =
          `Name=${encodeURIComponent(this.Registriren.Name)}&Stufe=${encodeURIComponent( this.Registriren.Stufe)}&Email=${encodeURIComponent( this.Registriren.Email)}&Passwort=${encodeURIComponent( this.Registriren.Passwort)}`

        const res = await axios.post(`Reg.php?${RegData}`)


        console.log(res)

      }

    },
  })

  app.mount('#app')
  </script>

</body>

</html>