<template>
  <form @submit="checkForm">
    <div class="form-group">
      <label for="name">Nombres y apellidos</label>
      <input
        type="text"
        class="form-control"
        id="name"
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
        <div class="form-group">
          <label for="phone">Tipo de documento</label>
          <select class="form-control" v-model="contact.documentType">
            <option value="">Seleccione una opción</option>
            <option value="1">Cédula</option>
            <option value="2">Pasaporte</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="phone">Número</label>
          <input
            type="tel"
            class="form-control"
            id="phone"
            v-model="contact.documentNumber"
            placeholder="Ingrese el número de documento"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="name">Dirección</label>
      <input
        type="text"
        class="form-control"
        id="name"
        aria-describedby="Ingrese el nombre y apellido"
        placeholder="Ingrese el nombre y apellido"
        v-model="contact.address"
      />
    </div>
    <div class="form-group">
      <label for="email">¿Como nos encontraste?</label>
      <select class="form-control" v-model="contact.knowUs">
        <option value="">Seleccione una opción</option>
        <option value="1">Facebook</option>
        <option value="2">Google</option>
      </select>
      <small id="emailHelp" class="form-text text-muted"
        >Nunca compartiremos su correo electrónico con nadie más.</small
      >
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary orange-btn">Enviar</button>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
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
    checkForm() {
      this.errors = [];

      if (!this.names) {
        this.errors.push("El nombre es obligatorio.");
      }


      if (!this.names.length>255) {
        this.errors.push("El nombre es muy largo.");
      }
      


      if (!this.email) {
        this.errors.push("El correo electrónico es obligatorio.");
      } else if (!this.validEmail(this.email)) {
        this.errors.push("El correo electrónico debe ser válido.");
      }

      if (!this.phone) {
        this.errors.push("El teléfono es obligatorio.");
      }

      if (!this.errors.length) {
        return true;
      }

      e.preventDefault();
    },
  },
};
</script>
