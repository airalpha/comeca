<template>
    <div>
        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="breadcrumb-area">
            <!-- Top Breadcrumb Area -->
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
                 style="background-image: url(/template/img/bg-img/24.jpg);">
                <h2>SHOP DETAILS</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Single Product Details Area Start ##### -->
        <section class="single_product_details_area mb-50">
            <div class="produts-details--content mb-50">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="single_product_thumb">
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item" :class="product.images[0] === image ? 'active' : ''"
                                             v-for="(image, index) in product.images">
                                            <a class="product-img" :href="image.path" title="Product Image">
                                                <img class="d-block w-100" :src="image.path" alt="1">
                                            </a>
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li class="active" data-target="#product_details_slider" :data-slide-to="index"
                                            :style="background(image.path)" v-for="(image, index) in product.images">
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="single_product_desc">
                                <h4 class="title">{{ product.name }}</h4>
                                <h4 class="price">{{ product.price }} FCFA</h4>
                                <div class="short_overview">
                                    <p>{{ product.description }}</p>
                                </div>

                                <div class="cart--area d-flex flex-wrap align-items-center">
                                    <!-- Add to Cart Form -->
                                    <form class="cart clearfix d-flex align-items-center" method="post">
                                        <div class="quantity">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" :max="product.quantity"
                                                   v-model="form.qte" name="quantity" value="1">
                                        </div>
                                        <button type="submit" name="addtocart" value="5"
                                                @click.prevent="addToCart(product)" class="btn alazea-btn ml-15">Add to
                                            cart
                                        </button>
                                    </form>
                                    <!-- Wishlist & Compare -->
                                    <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                        <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                        <a href="#" class="compare-btn ml-15"><i class="arrow_left-right_alt"></i></a>
                                    </div>
                                </div>

                                <div class="products--meta">
                                    <p><span>SKU:</span> <span>CT201807</span></p>
                                    <p v-if="product.category"><span>Category:</span>
                                        <span>{{ product.category.name }}</span></p>
                                    <p><span>Tags:</span> <span v-for="tag in product.tags">{{ tag.name }} &nbsp;</span></p>
                                    <p>
                                        <span>Share on:</span>
                                        <span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_details_tab clearfix">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                                <li class="nav-item">
                                    <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional
                                        Information</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                        class="text-muted">(1)</span></a>
                                </li>
                            </ul>
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="description">
                                    <div class="description_area">
                                        <p>{{ product.description }}</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                    <div class="additional_info_area">
                                        <p>What should I do if I receive a damaged parcel?
                                            <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit impedit similique qui, itaque delectus labore.</span>
                                        </p>
                                        <p>I have received my order but the wrong item was delivered to me.
                                            <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quam voluptatum beatae harum tempore, ab?</span>
                                        </p>
                                        <p>Product Receipt and Acceptance Confirmation Process
                                            <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ducimus, temporibus soluta impedit minus rerum?</span>
                                        </p>
                                        <p>How do I cancel my order?
                                            <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum eius eum, minima!</span>
                                        </p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="reviews">
                                    <div class="reviews_area">
                                        <ul class="d-flex">
                                            <li>
                                                <div class="single_user_review mb-15">
                                                    <div class="review-rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <span>Qualité</span>
                                                    </div>
                                                    <div class="review-details">
                                                        <p>Par <a href="#">Alpha</a> on <span>12 Sep 2018</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="submit_a_review_area mt-50">
                                        <h4>Votre avis</h4>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <span class="mr-15">Your Ratings:</span>
                                                        <div class="stars">
                                                            <input value="1" v-model="raiting.stars" type="radio" name="star"
                                                                   class="star-1" id="star-1">
                                                            <label class="star-1" for="star-1">1</label>
                                                            <input value="2" v-model="raiting.stars" type="radio" name="star" class="star-2" id="star-2">
                                                            <label class="star-2" for="star-2">2</label>
                                                            <input value="3" v-model="raiting.stars" type="radio" name="star" class="star-3" id="star-3">
                                                            <label class="star-3" for="star-3">3</label>
                                                            <input value="4" v-model="raiting.stars" type="radio" name="star" class="star-4" id="star-4">
                                                            <label class="star-4" for="star-4">4</label>
                                                            <input value="5" v-model="raiting.stars" type="radio" name="star" class="star-5" id="star-5">
                                                            <label class="star-5" for="star-5">5</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Votre nom</label>
                                                        <input type="text" class="form-control" id="name"
                                                               placeholder="Nom" v-model="raiting.user_name">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="options">Reason for your rating</label>
                                                        <select class="form-control" id="options" v-model="raiting.type">
                                                            <option value="quality">Qualité</option>
                                                            <option value="price">Prix</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="comments">Comments</label>
                                                        <textarea class="form-control" id="comments" rows="5"
                                                                  data-max-length="150" v-model="raiting.message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" @click.prevent="sendReview" class="btn alazea-btn">Submit Your Review
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Single Product Details Area End ##### -->

        <!-- ##### Related Product Area Start ##### -->
        <div class="related-products-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>Produits Similaires</h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3" v-for="product in raitingProduct" :key="product.id">
                        <div class="single-product-area mb-100">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a :href="route('shop-detail', {slug: product.slug})"><img :src="product.images[0].path"
                                                                                           alt=""></a>
                                <!-- Product Tag -->
                                <div class="product-tag">
                                    <a href="#">Hot</a>
                                </div>
                                <div class="product-meta d-flex">
                                    <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                    <add-to-cart :product="product"></add-to-cart>
                                    <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a :href="route('shop-detail', {slug: product.slug})">
                                    <p>{{ product.name }}</p>
                                </a>
                                <h6>{{ product.price }} FCFA</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Related Product Area End ##### -->
    </div>
</template>

<script>
    import AddToCart from "./AddToCart";
    export default {
        name: "ShopDetail",
        components: {AddToCart},
        props: {
            product_slug: String,
        },

        data() {
            return {
                products: [],
                product: {},
                form: new Form({
                    id: '',
                    name: '',
                    price: '',
                    qte: '1',
                }),
                raiting: new Form({
                    product_id: '',
                    id: '',
                    type: '',
                    user_name: '',
                    message: '',
                    stars: ''
                }),
            }
        },

        methods: {
            addToCart(product) {
                this.form.fill(product);
                this.form.qte = $("#qty").val();
                this.$Progress.start();
                this.form.post('/api/cart')
                    .then((data) => {
                        Fire.$emit('Aftercreate');
                        console.log(data);
                        Toast.fire({
                            icon: data.data.type,
                            title: data.data.message
                        });
                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            sendReview() {
                console.log(this.raiting);
            },

            loadProduct() {
                this.$Progress.start();
                axios.get('/api/product/slug/' + this.product_slug)
                    .then((data) => {
                        console.log(data);
                        this.product = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            loadProducts() {
                this.$Progress.start();
                axios.get('/api/product')
                    .then((data) => {
                        this.products = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            background(image) {
                return `background-image: url(${image});`
            }
        },

        computed: {
            raitingProduct() {
                return _.slice(this.products, 0, 4);
            }
        },

        mounted() {
        },

        created() {
            this.loadProduct();
            this.loadProducts();
        }
    }
</script>

<style scoped>

</style>
