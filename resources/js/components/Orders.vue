<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Toutes les commandes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Toutes commandes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <empty :message="'Aucune commande'" v-if="!orders.length"></empty>
        <div class="row">
            <div class="row">
                <!-- The time line -->
                <div class="timeline col-md-6" v-for="order in orders">
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-red">{{ order.date }}</span>
                        <span class="bg-primary">{{ order.user.name }}
                        <button @click="newModal(order.user)" type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-eye"></i>
                        </button>
                        </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-shopping-bag bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ order.date.split('-')[1] }}</span>
                            <h3 class="timeline-header"><a href="#">{{ order.amount }}</a> FCFA</h3>

                            <div class="timeline-body">
                                <h6 class="font-italic font-weight-bold">Produits</h6>
                                <div class="d-flex justify-content-around">
                                    <ul v-for="product in order.products">
                                        <li>N: {{ product.name }}</li>
                                        <li>Q: {{ product.qty }}</li>
                                    </ul>
                                </div>
                                <h6 class="font-italic font-weight-bold">Notes de livraisons</h6>

                                {{ order.notes }}
                            </div>
                            <div class="timeline-footer">
                                <a v-if="order.state === 2" class="btn btn-success btn-sm disabled"><i class="fas fa-check"></i> Validée</a>
                                <a v-if="order.state === 1" class="btn btn-primary btn-sm disabled"><i class="fas fa-bars"></i> En cours</a>
                                <a v-if="order.state === 1" class="btn btn-outline-primary btn-sm text-warning" @click="validate(order)"><i class="fas fa-check"></i> Marqué validé</a>
                            </div>
                        </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                        <i class="fas fa-end bg-gray"></i>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>

        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalTitle">{{ form.name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <ul>
                        <li><strong>E-mail : </strong> {{ form.email }}</li>
                        <li><strong>Phone : </strong> {{ form.phone }}</li>
                        <li><strong>City : </strong> {{ form.city }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Order",

        data() {
            return {
                orders: {},
                form: new Form({
                    city: '',
                    email: '',
                    name: '',
                    phone: ''
                }),
            }
        },

        mounted() {
            this.loadOrders();
        },

        methods: {
            loadOrders() {
                this.$Progress.start();
                axios.get('/api/all-orders')
                    .then((response) => {
                        console.log(response.data);
                        this.orders = response.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            validate(order) {
                this.$Progress.start();
                axios.get('/api/orders/mark-validate/'+order.id)
                    .then((response) => {
                        this.loadOrders();
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            newModal(user) {
                console.log(user);
                this.form.reset();
                this.form.fill(user)
                $('#userModal').modal('show');
            },
        }
    }
</script>

<style scoped>

</style>
