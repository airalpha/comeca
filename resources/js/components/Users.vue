<template>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header d-flex">
                <h3 class="card-title">Utilisateurs</h3>
                <button type="button" class="btn btn-outline-success ml-auto" data-toggle="modal"
                        data-target="#addUserModal">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Type</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.type }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Type</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalTitle">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="createUser">
                        <div class="modal-body">
                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input v-model="form.email" type="text" name="email" id="email"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>

                            <!-- Type Input -->
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select v-model="form.type" type="text" name="type" id="type"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                    <option value="" selected>Type de compte</option>
                                    <option value="admin">Admin</option>
                                    <option value="client">Clients</option>
                                    <option value="prod">Producteur</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                            </div>

                            <!-- Password Input -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input v-model="form.password" type="password" name="password" id="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: {},
                form: new Form({
                    name: '',
                    email: '',
                    type: '',
                    password: '',
                }),
            }
        },

        methods: {
            createUser() {
                this.$Progress.start();
                this.form.post('/api/user');
                this.$Progress.finish();
            },

            loadUsers() {
                this.$Progress.start();
                axios.get('api/user')
                    .then((data) => {
                        this.users = data.data;
                        $(function () {
                            $("#example1").DataTable();
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

        },

        mounted() {

        },

        created() {
            this.loadUsers();
        }
    }

</script>
