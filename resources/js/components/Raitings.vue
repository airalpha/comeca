<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Notes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card mt-5">
            <div class="card-header d-flex">
                <h3 class="card-title">Notes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="raitingTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="raiting in raitings" :key="raiting.id">
                        <td>{{ raiting.id }}</td>
                        <td v-if="raiting.product">{{ raiting.product.name }}</td>
                        <td>{{ raiting.type }}</td>
                        <td>{{ raiting.message }}</td>
                        <td>{{ raiting.user_name }}</td>
                        <td>{{ raiting.stars }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" @click="newModal(raiting)">
                                <i class="fas fa-eye white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" @click="deleteRaiting(raiting.id)">
                                <i class="fas fa-trash white">
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <!-- Add Tag Modal -->
        <div class="modal fade" id="raitingModal" tabindex="-1" role="dialog" aria-labelledby="raitingModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="raitingModalTitle">Détails de la note</h5>
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

                            <!-- Product Input -->
                            <div class="form-group" v-if="form.product">
                                <label for="name">Nom</label>
                                <input v-model="form.product.name" type="text" name="name" id="name"
                                       class="form-control" disabled>
                            </div>

                            <!-- Type Input -->
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input v-model="form.type" type="text" name="type" id="type"
                                       class="form-control" disabled>
                            </div>

                            <!-- Username Input -->
                            <div class="form-group">
                                <label for="user_name">Nom</label>
                                <input v-model="form.user_name" type="text" name="user_name" id="user_name"
                                       class="form-control" disabled>
                            </div>

                            <!-- stars Input -->
                            <div class="form-group">
                                <label for="stars">Note</label>
                                <input v-model="form.stars" type="number" name="stars" id="stars"
                                       class="form-control" disabled>
                            </div>

                            <!-- message Input -->
                            <div class="form-group">
                                <label for="message">Message</label>
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
                raitings: {},
                form: new Form({
                    id: '',
                    product_id: '',
                    type: '',
                    user_name: '',
                    stars: '',
                    message: ''
                }),
            }
        },

        methods: {
            loadRaitings() {
                this.$Progress.start();
                axios.get('/api/raitings')
                    .then((data) => {
                        this.raitings = data.data;
                        console.log(data.data);
                        $(function () {
                            $("#raitingTable").DataTable();
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            deleteRaiting(id) {
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
                        this.form.delete('/api/raitings/' + id)
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

            newModal(raiting) {
                this.form.fill(raiting);
                $('#raitingModal').modal('show');
            },
        },

        mounted() {
        },

        created() {
            this.loadRaitings();
            Fire.$on('Aftercreate', () => {
                this.loadRaitings();
            });
        }
    }

</script>
