<template>
  <div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>

    <div class="card">
      <div class="card-header">
        Create new Employee
        <router-link
          :to="{ name: 'EmployeesIndex' }"
          href=""
          class="btn btn-info float-right"
          >Back</router-link
        >
      </div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group row">
            <label
              for="first_name"
              class="col-md-4 col-form-label text-md-right"
              >First Name</label
            >
            <div class="col-md-6">
              <input
                id="first_name"
                type="text"
                class="form-control"
                v-model="form.first_name"
                autofocus
              />
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label
              for="middle_name"
              class="col-md-4 col-form-label text-md-right"
              >Middle Name</label
            >
            <div class="col-md-6">
              <input
                id="middle_name"
                type="text"
                class="form-control"
                v-model="form.middle_name"
                autofocus
              />
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right"
              >Last Name</label
            >
            <div class="col-md-6">
              <input
                id="last_name"
                type="text"
                class="form-control"
                v-model="form.last_name"
                autofocus
              />
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right"
              >Address</label
            >
            <div class="col-md-6">
              <input
                id="address"
                type="text"
                class="form-control"
                v-model="form.address"
                autofocus
              />
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right"
              >Country</label
            >
            <div class="col-md-6">
              <select
                class="form-control"
                v-model="form.country_id"
                autofocus
                @change="getStates()"
              >
                <option
                  v-for="country in countries"
                  :key="country.id"
                  :value="country.id"
                >
                  {{ country.name }}
                </option>
              </select>
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right"
              >State</label
            >
            <div class="col-md-6">
              <select
                class="form-control"
                id="state"
                v-model="form.state_id"
                autofocus
                @change="getCities()"
              >
                <option
                  v-for="state in states"
                  :key="state.id"
                  :value="state.id"
                >
                  {{ state.name }}
                </option>
              </select>

              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right"
              >City</label
            >
            <div class="col-md-6">
              <select
                class="form-control"
                id="city"
                v-model="form.city_id"
                autofocus
              >
                <option v-for="city in cities" :key="city.id" :value="city.id">
                  {{ city.name }}
                </option>
              </select>
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label
              for="department"
              class="col-md-4 col-form-label text-md-right"
              >Department</label
            >
            <div class="col-md-6">
              <select
                class="form-control"
                id="department"
                v-model="form.department_id"
                autofocus
              >
                <option v-for="department in departments" :key="department.id" :value="department.id">
                  {{ department.name }}
                </option>
              </select>
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <label for="zip_code" class="col-md-4 col-form-label text-md-right"
              >Zip Code</label
            >
            <div class="col-md-6">
              <input
                id="zip_code"
                type="text"
                class="form-control"
                v-model="form.zip_code"
                autofocus
              />
              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="birthdate" class="col-md-4 col-form-label text-md-right"
              >Birthdate</label
            >
            <div class="col-md-6">
              <datepicker
                input-class="form-control"
                v-model="form.birthdate"
              ></datepicker>
            </div>
          </div>

          <div class="form-group row">
            <label
              for="date_hired"
              class="col-md-4 col-form-label text-md-right"
              >Date Hired</label
            >
            <div class="col-md-6">
              <datepicker
                input-class="form-control"
                v-model="form.date_hired"
              ></datepicker>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-info float-right">
                Create Employee
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
export default {
  components: {
    Datepicker,
  },
  data() {
    return {
      countries: [],
      states: [],
      departments: [],
      cities: [],
      form: {
        first_name: "",
        last_name: "",
        middle_name: "",
        address: "",
        country_id: "",
        state_id: "",
        city_id: "",
        department_id: "",
        zip_code: "",
        birthdate: null,
        date_hired: null,
      },
    };
  },
  created() {
    this.getCountries();
    this.getDepartments();
  },
  methods: {
    getCountries() {
      axios
        .get("/api/employees/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    getStates() {
      axios
        .get("/api/employees/" + this.form.country_id + "/states")
        .then((res) => {
          this.states = res.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    getCities() {
      axios
        .get("/api/employees/" + this.form.state_id + "/cities")
        .then((res) => {
          this.cities = res.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    getDepartments() {
      axios
        .get("/api/employees/departments")
        .then((res) => {
          this.departments = res.data;
          console.log(res.data)
        })
        .catch((error) => {
          console.log("Error");
        });
    },
  },
};
</script>

<style>
</style>
