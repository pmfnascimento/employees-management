<template>
  <div>
          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div>

                    <div class="alert alert-success">

                    </div>

            </div>
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="GET" accept="">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" name="search" class="form-control" id="search"
                                            placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-info">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="" class="btn btn-info">Create</a>
                        </div>

                        </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manager</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=""
                                            class="btn btn-info col-md-8">Edit</a>
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

}
</script>

<style>

</style>
