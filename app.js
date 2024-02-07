  
  const { createApp, ref } = Vue
  
  const app= createApp({
data() {
    return{



Component:{
    Anmelden:false,
    Registriren:false,
    KursListe:true,
    },
    Anmelden:{
    Email:undefined,
    Passwort:undefined
    },
    Registriren:{
    Name:undefined,
    Stufe:undefined,
    Email:undefined,
    Passwort:undefined,



    },

Kurse:undefined,

}


},
 methods: {
    AnmeldenAufrufen(){

        this.Component.Anmelden=true
        this.Component.Registriren=false
        this.Component.KursListe=false

    },   
    
    Close(){
        this.Component.Anmelden=false
        this.Component.Registriren=false
        this.Component.KursListe=true

    },
    RegistrirenAufrufen(){

        this.Component.Registriren=true
        this.Component.Anmelden=false
        this.Component.KursListe=false

    },  

   async GetAllCurse(){

    const res= await axios.get("./Kurse.php")
    this.Kurse=res.data

    },
async mAnmelden(){
    const res= await axios.post("http://localhost/?Anmelden")

},
 async mRegistriren(){
const RegData=
`Name=${encodeURIComponent(this.Registriren.Name)}&Stufe=${encodeURIComponent( this.Registriren.Stufe)}&Email=${encodeURIComponent( this.Registriren.Email)}&Passwort=${encodeURIComponent( this.Registriren.Passwort)}`    
console.log(RegData)
const res= await axios.post(`Reg.php?${RegData}`)


console.log(res)

}

           },
   })
 
 app.mount('#app')