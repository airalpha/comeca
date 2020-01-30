<template>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header d-flex">
                <h3 class="card-title">Utilisateurs</h3>
                <button type="button" class="btn btn-outline-success ml-auto" @click="newModal()">
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
                            <a class="btn btn-info btn-sm" @click="editModal(user)">
                                <i class="fas fa-pencil-alt white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" @click="deleteUser(user.id)">
                                <i class="fas fa-trash white">
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
        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalTitle">{{ editMode ? "Modifier " : "Ajouter " }} un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateUser() : createUser()">
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
                            <button type="submit" v-show="!editMode" class="btn btn-primary">Ajouter</button>
                            <button type="submit" v-show="editMode" class="btn btn-primary">Modifier</button>
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
                editMode: true,
                users: {},
                form: new Form({
                    id: '',
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
                this.form.post('/api/user')
                    .then(() => {
                        Fire.$emit('Aftercreate');
                        $('#userModal').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: 'Utilisateur ajouté !'
                        });

                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            updateUser() {
                this.$Progress.start();
                this.form.put('/api/user/' + this.form.id)
                    .then((data) => {
                        $('#userModal').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: data.data.message
                        });

                        this.$Progress.finish();
                        Fire.$emit('Aftercreate');
                    }, (error) => {
                        this.$Progress.fail();
                    });
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

            deleteUser(id) {
                Swal.fire({
                    title: 'Etes vous sure ?',
                    text: "Vous ne pourrez pas revenir sur cela !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui supprimer !'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/user/' + id)
                            .then((data) => {
                                Swal.fire(
                                    'Supprimer !',
                                    data.data.message,
                                    'success'
                                );
                                Fire.$emit('Aftercreate');
                            }, (error) => {
                                Swal.fire(
                                    'Oups !',
                                    'Nous avons rencontré une erreur',
                                    'warning'
                                )
                            });
                    }
                })
            },

            newModal() {
                this.editMode = false;
                this.form.reset();
                $('#userModal').modal('show');
            },

            editModal(user) {
                this.editMode = true;
                this.form.reset();
                $('#userModal').modal('show');
                this.form.fill(user);
            }
        },

        mounted() {

        },

        created() {
            this.loadUsers();
            Fire.$on('Aftercreate', () => {
                this.loadUsers();
            });
        }
    }

</script>
