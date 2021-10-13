<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div>
          <div v-if="showMessage" class="alert alert-success">{{ message }}</div>
        </div>
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <form method="GET" accept="">
                  <div class="form-row align-items-center">
                    <div class="col">
                      <input
                        type="search"
                        name="search"
                        class="form-control"
                        id="search"
                        placeholder="Search"
                      />
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-info">Search</button>
                    </div>
                  </div>
                </form>
              </div>
              <div>
                <router-link
                  :to="{ name: 'EmployeesCreate' }"
                  href=""
                  class="btn btn-info"
                  >Create</router-link
                >
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Department</th>
                  <th scope="col">Manager</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="employee in employees" :key="employee.id">
                  <th scope="row">#{{ employee.id }}</th>
                  <td>{{ employee.first_name }}</td>
                  <td>{{ employee.last_name }}</td>
                  <td>{{ employee.address }}</td>
                  <td>{{ employee.department.name }}</td>
                  <td>
                      <router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}" class="btn btn-info">Edit</router-link>
                      <button class="btn btn-primary" @click="deleteEmployee(employee.id)">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      employees: [],
      showMessage: false,
      message: ''
    };
  },
  created() {
    this.getEmployees();
  },
  methods: {
    getEmployees() {
      axios
        .get("/api/employees")
        .then(res => {
          this.employees = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteEmployee(id){
        axios
        .delete("/api/employees/" + id)
        .then(res => {
            this.getEmployees();
            this.message = res.data;
            this.showMessage = true;
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
};
</script>

<style>
</style>
