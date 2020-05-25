<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Coupons</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Coupons</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card mt-5">
            <div class="card-header d-flex">
                <h3 class="card-title">discounts</h3>
                <button type="button" class="btn btn-outline-success ml-auto" @click="newModal()">
                    <i class="fas fa-plus"></i><i class="fas fa-discount"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="discountTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Pourcentage</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="discount in discounts" :key="discount.id">
                        <td>{{ discount.id }}</td>
                        <td>{{ discount.code }}</td>
                        <td>{{ discount.percent }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" @click="editModal(discount)">
                                <i class="fas fa-pencil-alt white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" @click="deleteDiscount(discount.id)">
                                <i class="fas fa-trash white">
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Pourcentage</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <!-- Add discount Modal -->
        <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="discountModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="discountModalTitle">{{ editMode ? "Modifier " : "Ajouter " }} un coupons</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateDiscount() : createDiscount()">
                        <div class="modal-body">
                            <!-- Code Input -->
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input v-model="form.code" type="text" name="code" id="code"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                                <has-error :form="form" field="code"></has-error>
                            </div>

                            <!-- Percent Input -->
                            <div class="form-group">
                                <label for="percent">Pourcentage</label>
                                <input v-model.number="form.percent" type="text" name="code" id="percent"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('percent') }">
                                <has-error :form="form" field="percent"></has-error>
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
                discounts: {},
                form: new Form({
                    id: '',
                    code: '',
                    percent: ''
                }),
            }
        },

        methods: {
            createDiscount() {
                this.$Progress.start();
                this.form.post('/api/discount')
                    .then((data) => {
                        Fire.$emit('Aftercreate');
                        $('#discountModal').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: data.data.message
                        });

                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            updateDiscount() {
                this.$Progress.start();
                this.form.put('/api/discount/' + this.form.id)
                    .then((data) => {
                        $('#discountModal').modal('hide');
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

            loadDiscounts() {
                this.$Progress.start();
                axios.get('/api/discount')
                    .then((data) => {
                        this.discounts = data.data;
                        $(function () {
                            $("#discountTable").DataTable();
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            deleteDiscount(id) {
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
                        this.form.delete('/api/discount/' + id)
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
                $('#discountModal').modal('show');
            },

            editModal(discount) {
                this.editMode = true;
                this.form.reset();
                $('#discountModal').modal('show');
                this.form.fill(discount);
            }
        },

        mounted() {

        },

        created() {
            this.loadDiscounts();
            Fire.$on('Aftercreate', () => {
                this.loadDiscounts();
            });
        }
    }

</script>
