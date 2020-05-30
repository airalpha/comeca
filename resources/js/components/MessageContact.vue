<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Messages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Messages</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card mt-5">
            <div class="card-header d-flex">
                <h3 class="card-title">Messages</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tagTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Message</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="message in messages" :key="message.id">
                        <td>{{ message.id }}</td>
                        <td>{{ message.name }}</td>
                        <td>{{ message.email }}</td>
                        <td>{{ message.subject }}</td>
                        <td>{{ message.message }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" @click="newModal(message)">
                                <i class="fas fa-eye white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" @click="deleteMessage(message.id)">
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
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Message</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <!-- Add Tag Modal -->
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModalTitle">Détails du message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <!-- Id Input -->
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input v-model="form.id" type="number" name="id" id="id"
                                       class="form-control" disabled>
                            </div>

                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                       class="form-control" disabled>
                            </div>

                            <!-- subject Input -->
                            <div class="form-group">
                                <label for="subject">Nom</label>
                                <input v-model="form.subject" type="text" name="subject" id="subject"
                                       class="form-control" disabled>
                            </div>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input v-model="form.email" type="email" name="email" id="email"
                                       class="form-control" disabled>
                            </div>

                            <!-- message Input -->
                            <div class="form-group">
                                <label for="message">Nom</label>
                                <textarea v-model="form.message" type="text" name="message" id="message"
                                          class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
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
                messages: {},
                form: new Form({
                    id: '',
                    name: '',
                    subject: '',
                    email: '',
                    message: ''
                }),
            }
        },

        methods: {
            createTag() {
                this.$Progress.start();
                this.form.post('/api/tag')
                    .then((data) => {
                        Fire.$emit('Aftercreate');
                        $('#messageModal').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: data.data.message
                        });

                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            loadMessages() {
                this.$Progress.start();
                axios.get('/api/contact/messages')
                    .then((data) => {
                        this.messages = data.data;
                        $(function () {
                            $("#tagTable").DataTable();
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            deleteMessage(id) {
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
                        this.form.delete('/api/contact/messages/' + id)
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

            newModal(message) {
                this.form.fill(message);
                $('#messageModal').modal('show');
            },
        },

        mounted() {
        },

        created() {
            this.loadMessages();
            Fire.$on('Aftercreate', () => {
                this.loadMessages();
            });
        }
    }

</script>
