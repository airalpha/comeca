<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tags</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card mt-5">
            <div class="card-header d-flex">
                <h3 class="card-title">Tags</h3>
                <button type="button" class="btn btn-outline-success ml-auto" @click="newModal()">
                    <i class="fas fa-plus"></i><i class="fas fa-tag"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tagTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="tag in tags" :key="tag.id">
                        <td>{{ tag.id }}</td>
                        <td><span class="btn badge-primary">{{ tag.name }}</span></td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" @click="editModal(tag)">
                                <i class="fas fa-pencil-alt white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" @click="deleteTag(tag.id)">
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
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <!-- Add Tag Modal -->
        <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tagModalTitle">{{ editMode ? "Modifier " : "Ajouter " }} un tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateTag() : createTag()">
                        <div class="modal-body">
                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
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
                tags: {},
                form: new Form({
                    id: '',
                    name: '',
                }),
            }
        },

        methods: {
            createTag() {
                this.$Progress.start();
                this.form.post('/api/tag')
                    .then((data) => {
                        Fire.$emit('Aftercreate');
                        $('#tagModal').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: data.data.message
                        });

                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            updateTag() {
                this.$Progress.start();
                this.form.put('/api/tag/' + this.form.id)
                    .then((data) => {
                        $('#tagModal').modal('hide');
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

            loadtag() {
                this.$Progress.start();
                axios.get('/api/tag')
                    .then((data) => {
                        this.tags = data.data;
                        $(function () {
                            $("#tagTable").DataTable();
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            deleteTag(id) {
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
                        this.form.delete('/api/tag/' + id)
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
                $('#tagModal').modal('show');
            },

            editModal(tag) {
                this.editMode = true;
                this.form.reset();
                $('#tagModal').modal('show');
                this.form.fill(tag);
            }
        },

        mounted() {

        },

        created() {
            this.loadtag();
            Fire.$on('Aftercreate', () => {
                this.loadtag();
            });
        }
    }

</script>
