<template>
 <div>
     <p v-if="errors.length">
    <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
    <ul>
      <li v-for="error in errors">{{ error }}</li>
    </ul>
  </p>
  <form @submit="checkForm">
    <div class="form-group">
      <label for="name">Nombres y apellidos</label>
      <input
        type="text"
        class="form-control"
        id="name"
        maxlength = "255"
        required
        aria-describedby="Ingrese el nombre y apellido"
        placeholder="Ingrese el nombre y apellido"
        v-model="contact.names"
      />
    </div>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-8">
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input
            type="email"
            class="form-control"
            id="email"
            required
            aria-describedby="Ingrese el correo electrónico"
            placeholder="Ingrese el correo electrónico"
            v-model="contact.email"
          />
          <small id="emailHelp" class="form-text text-muted"
            >Nunca compartiremos su correo electrónico con nadie más.</small
          >
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input
            type="tel"
            required
            class="form-control"
            id="phone"
            placeholder="Ingrese el teléfono"
            v-model="contact.phone"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group" required>
          <label for="phone">Tipo de documento</label>
          <select class="form-control" v-model="contact.documentType" required @change="checkDropdownType">
            <option value="">Seleccione una opción</option>
            <option value="1">Cédula</option>
            <option value="2">Cédula de extrangería</option>
            <option value="3">Pasaporte</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="phone">Número</label>
          <input
            type="tel"
            required
            @keypress="contact.documentType==1 ?isNumber($event) : null "
            class="form-control"
            id="phone"
            maxlength = "11"
            minlength = "6"
            v-model="contact.documentNumber"
            :disabled="contact.documentType.length==0"
            :placeholder="'Ingrese el número de documento '"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="address">Dirección</label>
      <input
        type="text"
        class="form-control"
        id="address"
        required
        maxlength = "255"
        aria-describedby="Ingrese el nombre y apellido"
        placeholder="Ingrese el nombre y apellido"
        v-model="contact.address"
      />
    </div>
    <div class="form-group">
      <label for="knowus">¿Como nos encontraste?</label>
       <input
        type="text"
        class="form-control"
        id="knowus"
        aria-describedby="Ingrese donde nos encontro"
        placeholder="Ingrese donde nos encontro"
         maxlength = "255"
        v-model="contact.knowUs"
      />
      
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary orange-btn">Enviar</button>
    </div>
  </form>
 </div>
</template>

<script>
export default {
  data() {
    return {
      errors: [],

      contact: {
        names: null,
        email: null,
        phone: null,
        documentType: "",
        documentNumber: null,
        address: null,
        knowUs: "",
      },
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    checkDropdownType() {
      if (!this.contact.documentType) {
        console.log("entra aqui");
        this.contact.documentNumber = "";
      }
      console.log(this.contact.documentType);
    },
    isNumber: function (evt) {
      evt = evt ? evt : window.event;
      var charCode = evt.which ? evt.which : evt.keyCode;
      if (
        charCode > 31 &&
        (charCode < 48 || charCode > 57) &&
        charCode !== 46
      ) {
        evt.preventDefault();
      } else {
        return true;
      }
    },
    validEmail: function (email) {
      console.log("aqui esta el email ", this.contact.email);
      return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
    },
    sendForm() {
      let contact = this.contact;
      axios
        .post("/sendContact", contact)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
           const data = error.response.data.data;
          data.forEach((element) => {
            this.errors.push(element);
          });
        });
    },
    checkForm(e) {
      this.errors = [];
      const {
        names,
        email,
        phone,
        documentType,
        documentNumber,
      } = this.contact;

      if (!names) {
        this.errors.push("El nombre es obligatorio.");
      } else {
        if (names.length > 255) {
          this.errors.push("El nombre es muy largo.");
        }
      }

      if (!email) {
        this.errors.push("El correo electrónico es obligatorio.");
      } else if (!this.validEmail(this.contact.email)) {
        this.errors.push("El correo electrónico debe ser válido.");
      }

      if (!phone) {
        this.errors.push("El teléfono es obligatorio.");
      }

      if (!documentType) {
        this.errors.push("El tipo de documento es obligatorio.");
      }

      if (!documentNumber) {
        this.errors.push("El documento es obligatorio.");
      }

      if (!this.errors.length) {
        this.sendForm();
      }

      e.preventDefault();
    },
  },
};
</script>
