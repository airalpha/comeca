<template>
    <div>
        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="breadcrumb-area">
            <!-- Top Breadcrumb Area -->
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(/template/img/bg-img/24.jpg);">
                <h2>Shop</h2>
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
                    <!-- Shop Sorting Data -->
                    <div class="col-12">
                        <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                            <!-- Shop Page Count -->
                            <div class="shop-page-count">
                                <p>Showing 1–9 of 72 results</p>
                            </div>
                            <!-- Search by Terms -->
                            <div class="search_by_terms">
                                <form action="#" method="post" class="form-inline">
                                    <select class="custom-select widget-title">
                                        <option selected>Short by Popularity</option>
                                        <option value="1">Short by Newest</option>
                                        <option value="2">Short by Sales</option>
                                        <option value="3">Short by Ratings</option>
                                    </select>
                                    <select class="custom-select widget-title">
                                        <option selected>Show: 9</option>
                                        <option value="1">12</option>
                                        <option value="2">18</option>
                                        <option value="3">24</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Sidebar Area -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="shop-sidebar-area">

                            <!-- Shop Widget -->
                            <div class="shop-widget price mb-50">
                                <h4 class="widget-title">Prices</h4>
                                <div class="widget-desc">
                                    <div class="slider-range">
                                        <div data-min="1" data-max="30000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="1" data-value-max="30000" data-label-result="Price:">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all first-handle" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Price: $8 - $30</div>
                                    </div>
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
                                        <input type="checkbox" class="custom-control-input" id="news" value="news" v-model="others">
                                        <label class="custom-control-label" for="news">Récents</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="az" value="az" v-model="others">
                                        <label class="custom-control-label" for="az">A-Z</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                        <label class="custom-control-label" for="customCheck9">Z-A</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                        <label class="custom-control-label" for="customCheck10">Prix bas</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">Prix élévé</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget best-seller mb-50">
                                <h4 class="widget-title">Meilleurs Ventes</h4>
                                <div class="widget-desc">

                                    <!-- Single Best Seller Products -->
                                    <div class="single-best-seller-product d-flex align-items-center">
                                        <div class="product-thumbnail">
                                            <a href="shop-details.html"><img src="/template/img/bg-img/4.jpg" alt=""></a>
                                        </div>
                                        <div class="product-info">
                                            <a href="shop-details.html">Cactus Flower</a>
                                            <p>$10.99</p>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Best Seller Products -->
                                    <div class="single-best-seller-product d-flex align-items-center">
                                        <div class="product-thumbnail">
                                            <a href="shop-details.html"><img src="/template/img/bg-img/5.jpg" alt=""></a>
                                        </div>
                                        <div class="product-info">
                                            <a href="shop-details.html">Tulip Flower</a>
                                            <p>$11.99</p>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Best Seller Products -->
                                    <div class="single-best-seller-product d-flex align-items-center">
                                        <div class="product-thumbnail">
                                            <a href="shop-details.html"><img src="/template/img/bg-img/34.jpg" alt=""></a>
                                        </div>
                                        <div class="product-info">
                                            <a href="shop-details.html">Recuerdos Plant</a>
                                            <p>$9.99</p>
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
                                            <a :href="route('shop-detail', {id: product.id})"><img :src="getImage(product.image)" alt=""></a>
                                            <div class="product-meta d-flex">
                                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                                <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                            </div>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <a :href="route('shop-detail', {id: product.id})">
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
                others: [],
                selectedCategory: [],
                products: [],
                categories: [],
            }
        },

        methods: {
            loadProducts() {
                this.$Progress.start();
                axios.get('api/product')
                    .then((data) => {
                        this.products = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
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
            alert("Sop");
        },

        computed: {
            filterProtuct: {
              get: function () {
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
              },
            },
        },

        created() {
            this.loadCategories();
            this.loadProducts();
        }
    }
</script>

<style scoped>

</style>
