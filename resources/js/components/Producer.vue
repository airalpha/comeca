<template>
    <div>
        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="breadcrumb-area">
            <!-- Top Breadcrumb Area -->
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(/template/img/bg-img/24.jpg);">
                <h2>Producteurs</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Producteurs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Shop Area Start ##### -->
        <section class="shop-page section-padding-0-100">
            <div class="container">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch" v-for="producer in producers" :key="producer.id">
                            <div class="card border-success shadow-sm p-3 mb-1 rounded">
                                <div class="card-header text-muted border-bottom-0">
                                    Producteur Pro
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ producer.name }}</b></h2>
                                            <p class="text-muted text-sm"><b>Bio: </b> {{ producer.profile.bio }} </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Addresse: {{ producer.profile.city }}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ producer.profile.phone}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img :src="getImageP(producer.profile.avatar)" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch" v-if="producers.length === 0">
                        <empty></empty>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Shop Area End ##### -->
    </div>
</template>

<script>
    export default {
        name: "Producer",

        data() {
            return {
                producers: []
            }
        },

        methods: {
            loadProducers() {
                this.$Progress.start();
                axios.get('/api/producers')
                    .then((data) => {
                        console.log(data.data);
                        this.producers = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            getImageP(image) {
                return image;
            }
        },

        mounted() {

        },

        created() {
            this.loadProducers();
        }
    }
</script>

<style scoped>

</style>
