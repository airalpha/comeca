<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mes commandes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Commandes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <div class="timeline" v-for="order in orders">
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-red">{{ order.date }}</span>
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
                                <a class="btn btn-success btn-sm"><i class="fas fa-check"></i> Validée</a>
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
    </div>
</template>

<script>
    export default {
        name: "Order",

        data() {
            return {
                orders: {},
            }
        },

        mounted() {
            this.loadOrders();
        },

        methods: {
            loadOrders() {
                this.$Progress.start();
                axios.get('/api/orders')
                    .then((response) => {
                        console.log(response.data);
                        this.orders = response.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },
        }
    }
</script>

<style scoped>

</style>
