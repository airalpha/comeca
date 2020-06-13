<template>
    <div>
        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="breadcrumb-area">
            <!-- Top Breadcrumb Area -->
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(/template/img/bg-img/24.jpg);">
                <h2>Boutique</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                <div class="row">
                    <!-- Sidebar Area -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="shop-sidebar-area">

                            <!-- Shop Widget -->
                            <div class="shop-widget price mb-50">
                                <h4 class="widget-title">Prix</h4>
                                <div class="slider-green">
                                    <input id="slider-input" type="text" value="" class="slider form-control" data-slider-min="100" data-slider-max="50000"
                                           data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                                           data-slider-selection="before" data-slider-tooltip="show">
                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget catagory mb-50">
                                <h4 class="widget-title">Categories</h4>
                                <div class="widget-desc">
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2" v-for="category in categories" :key="category.id">
                                        <input type="checkbox" class="custom-control-input" :id="category.name" :value="category.name" v-model="selectedCategory">
                                        <label class="custom-control-label" :for="category.name">{{ category.name}} <span class="text-muted">({{ category.products.length }})</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget sort-by mb-50">
                                <h4 class="widget-title">Sort by</h4>
                                <div class="widget-desc">
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="news" value="news" v-model="others.recent">
                                        <label class="custom-control-label" for="news">Récents</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="az" value="az" v-model="others.az">
                                        <label class="custom-control-label" for="az">A-Z</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget best-seller mb-50">
                                <h4 class="widget-title">Meilleurs Ventes</h4>
                                <div class="widget-desc">

                                    <!-- Single Best Seller Products -->
                                    <div v-for="product in products" :key="product.id" class="single-best-seller-product d-flex align-items-center">
                                        <div class="product-thumbnail">
                                            <a :href="route('shop-detail', {slug: product.slug})">
                                                <img :src="product.images[0].path" alt=""></a>
                                        </div>
                                        <div class="product-info">
                                            <a :href="route('shop-detail', {slug: product.slug})">{{ product.name }}</a>
                                            <p>{{ product.price }} FCFA</p>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All Products Area -->
                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="shop-products-area">
                            <div class="row">
                                <!-- Single Product Area -->
                                <div class="col-12 col-sm-6 col-lg-4" v-for="product in filterProtuct" :key="product.id">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <a :href="route('shop-detail', {slug: product.slug})"><img :src="product.images[0].path" alt=""></a>
                                            <div class="product-meta d-flex">
                                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                                <a href="#" class="add-to-cart-btn" @click.stop="addToCart(product)">Add to cart</a>
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

                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Shop Area End ##### -->
    </div>
</template>

<script>
    export default {
        name: "Shop",

        data(){
            return {
                min: 0,
                max:0,
                others: {
                    recent: null,
                    az: null,
                },
                selectedCategory: [],
                products: [],
                categories: [],
                form: new Form({
                    id: '',
                    name: '',
                    price: '',
                    qte: '1',
                }),
            }
        },

        methods: {
            addToCart(product) {
                this.form.fill(product);
                this.$Progress.start();
                this.form.post('/api/cart')
                    .then((data) => {
                        Toast.fire({
                            icon: data.data.type,
                            title: data.data.message
                        });
                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            loadProducts() {
                this.$Progress.start();
                axios.get('api/product')
                    .then((data) => {
                        this.products = data.data;
                        this.max = _.maxBy(this.products, 'price').price;
                        this.min = _.minBy(this.products, 'price').price;
                        console.log(this.min, this.max);
                        this.$nextTick(() => {
                            $("#slider-input").attr('data-slider-min', this.min)
                            $("#slider-input").attr('data-slider-max', this.max)
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                console.log(this.min, this.max);
                this.$Progress.finish();
            },

            loadCategories() {
                this.$Progress.start();
                axios.get('api/category')
                    .then((data) => {
                        this.categories = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            getImage(name) {
                return "uploads/products/" + name;
            },
        },

        mounted() {
            this.loadCategories();
            this.loadProducts();
            $('.slider').bootstrapSlider()
        },

        computed: {
            filterProtuct: function () {
                let result1 = this.products.filter((product) => {
                    let cats = this.selectedCategory.length ? -1 !== _.indexOf(this.selectedCategory, product.category.name) : true;
                    return cats;
                })
                if(this.others.recent) {
                    result1 =  result1.sort(function (product1, product2) {
                        return new Date(product2.created_at) - new Date(product1.created_at);
                    })
                }
                if(this.others.az) {
                    console.log("az")
                    result1 =  result1.sort(function (product1, product2) {
                        return product1.name.localeCompare(product2.name);
                    })
                }

                return result1;
              /*get: function () {
                  let cats = this.selectedCategory;
                  let oths = this.others;
                  if(-1 !== _.indexOf(oths, "news")) {
                      return this.products.sort(function (product1, product2) {
                          return new Date(product2.created_at) - new Date(product1.created_at);
                      })
                  }
                  if(_.isEmpty(cats)) {
                      return this.products;
                  } else {
                      return this.products.filter(function (product) {
                          return -1 !== _.indexOf(cats, product.category.name);
                      });
                  }
              },*/
            },

            bestProduct() {
                _.slice(this.products.reverse(), 0, 3);
            }
        },

        created() {
        }
    }
</script>

<style scoped>
    .irs--flat .irs-bar {
        background-color: #70c745 !important;
    }
</style>
