<template>
<div>
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
</div>

<div class="card">
    <div class="card-header">
        Create new Employee
        <router-link :to="{name: 'EmployeesIndex'}" href="" class="btn btn-info float-right">Back</router-link>
    </div>
    <div class="card-body">

        <form method="POST" action="">

            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-control" name="first_name"  autocomplete="first_name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
                <div class="col-md-6">
                    <input id="middle_name" type="text" class="form-control" name="middle_name"  autocomplete="middle_name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>


            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control" name="last_name"  autocomplete="last_name" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address"  autocomplete="address" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>


            <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                <div class="col-md-6">
                    <select class="form-control" id="country" name="country" autocomplete="country" autofocus>
                        <option value="">Select an Country</option>
                        <option value="">x</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
            </div>


            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                <div class="col-md-6">
                    <select class="form-control" id="state" name="state" autocomplete="state" autofocus>
                        <option value="">Select an Country</option>
                        <option value="">x</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                <div class="col-md-6">
                    <select class="form-control" id="department" name="department" autocomplete="department" autofocus>
                        <option value="">Select an Country</option>
                        <option value="">x</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                <div class="col-md-6">
                    <select class="form-control" id="city" name="city" autocomplete="city" autofocus>
                        <option value="">Select an Country</option>
                        <option value="">x</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip Code</label>
                <div class="col-md-6">
                    <input id="zip_code" type="text" class="form-control" name="zip_code"  autocomplete="zip_code" autofocus>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="birthdate" class="col-md-4 col-form-label text-md-right">Birthdate</label>
                <div class="col-md-6">
                    <datepicker input-class="form-control"></datepicker>
                </div>
            </div>

            <div class="form-group row">
                <label for="date_hired" class="col-md-4 col-form-label text-md-right">Date Hired</label>
                <div class="col-md-6">
                    <datepicker input-class="form-control"></datepicker>
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

import Datepicker from 'vuejs-datepicker';
export default {
    components :{
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            departements: [],
            cities: []
        }
    },
    created() {
        this.getCountries();
    },
    methods: {
        getCountries(){
            axios.get('/api/employees/countries')
                .then(res => {
                    this.countries = res.data
                    console.log(res.data)
                }).catch(error => {
                    console.log('Error')
                })
        }
    }
}
</script>

<style>

</style>
