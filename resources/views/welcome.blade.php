@extends('layouts.template')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url({{ asset("template/img/bg-img/1.jpg") }});"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Les plantes existent dans le temps et les rayons lumineux qui les entourent</h2>
                                <p>Les produits forestiers non ligneux (PFNL), également appelés « produits forestiers autres que le bois », ou bien « produits forestiers secondaires » ou « mineurs », ou « spéciaux », sont, selon la définition de la FAO, des biens d'origine biologique autres que le bois, dérivés des forêts, d'autres terres boisées et des arbres hors forêts1. Ce sont des substances, des matières premières ou des matériaux utiles obtenus des forêts sans exploitation forestière, c'est-à-dire sans qu'il soit nécessaire d'abattre des arbres. Il peut s'agir par exemple d'animaux chassés comme gibier ou pour leur fourrure, ou de poissons, de fruits (baies, noix, etc.), de graines, d'épices, de champignons, de feuilles (fourrage), de plantes médicinales, de tourbe, etc.</p>
                                <div class="welcome-btn-group">
                                    <a href="/shop" class="btn alazea-btn mr-30">COMMENCER</a>
                                    <a href="/contact" class="btn alazea-btn active">CONTACT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url({{ asset("template/img/bg-img/2.jpg") }});"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Les plantes existent dans le temps et les rayons lumineux qui les entourent</h2>
                                <p>Les produits forestiers non ligneux (PFNL), également appelés « produits forestiers autres que le bois », ou bien « produits forestiers secondaires » ou « mineurs », ou « spéciaux », sont, selon la définition de la FAO, des biens d'origine biologique autres que le bois, dérivés des forêts, d'autres terres boisées et des arbres hors forêts1. Ce sont des substances, des matières premières ou des matériaux utiles obtenus des forêts sans exploitation forestière, c'est-à-dire sans qu'il soit nécessaire d'abattre des arbres. Il peut s'agir par exemple d'animaux chassés comme gibier ou pour leur fourrure, ou de poissons, de fruits (baies, noix, etc.), de graines, d'épices, de champignons, de feuilles (fourrage), de plantes médicinales, de tourbe, etc.</p>
                                <div class="welcome-btn-group">
                                    <a href="/shop" class="btn alazea-btn mr-30">COMMENCER</a>
                                    <a href="/contact" class="btn alazea-btn active">CONTACT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>À PROPOS DE NOUS</h2>
                        <p>Nous sommes leader dans le domaine des ventes des PFNL.</p>
                    </div>
                    <p>Regarder les différents type de produits que nous proposons.</p>

                    <!-- Progress Bar Content Area -->
                    <div class="alazea-progress-bar mb-50">
                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Origine végétale</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Origine animale</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="70"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Cosmétiques</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="85"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Touristiques</p>
                            <div id="bar4" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="65"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset("template/img/core-img/b1.png") }}" alt="">
                                    <h5>Produits de qualité</h5>
                                    <p></p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset("template/img/core-img/b2.png") }}" alt="">
                                    <h5>Service parfait</h5>
                                    <p></p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset("template/img/core-img/b3.png") }}" alt="">
                                    <h5>100% Naturel</h5>
                                    <p></p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="{{ asset("template/img/core-img/b4.png") }}" alt="">
                                    <h5>Écologique</h5>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        @foreach($testimonials as $testimonial)
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="{{ $testimonial->image }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TÉMOIGNAGE</h2>
                                            <p>Quelques mots aimables de clients sur COMECA</p>
                                        </div>
                                        <p>“{{ $testimonial->text }}”</p>
                                        <div class="testimonial-author-info">
                                            <h6>{{ $testimonial->name }}</h6>
                                            <p>{{ $testimonial->work }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Product Area Start ##### -->
    <section class="new-arrivals-products-area bg-white section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NOUVEAU PRODUITS</h2>
                        <p>Nous avons les derniers produits, ça doit être passionnant pour vous</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($products as $product)
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="{{ route('shop-detail', ['slug' => $product->slug]) }}"><img src="{{ $product->images->first()->path }}" alt=""></a>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <a href="#">Hot</a>
                            </div>
                            <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <add-to-cart :product="{{ $product }}"></add-to-cart>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="{{ route('shop-detail', ['slug' => $product->slug]) }}">
                                <p>{{ $product->name }}</p>
                            </a>
                            <h6>{{ $product->price }} FCFA</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12 text-center">
                    <a href="{{ route("shop") }}" class="btn alazea-btn">Vior tout</a>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Product Area End ##### -->

    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-newsletter-area" style="background-image: url(template/img/bg-img/subscribe.png);">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading mb-0">
                        <h2>Rejoignez la newsletter</h2>
                        <p>Abonnez-vous à notre newsletter et recevez les informations sur nos differents produits</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form">
                        <form action="#" method="get">
                            <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Enter your email">
                            <button type="submit" class="btn alazea-btn">S'ABONNER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Side Thumbnail -->
        <div class="subscribe-side-thumb wow fadeInUp" data-wow-delay="500ms">
            <img class="first-img" src="{{ asset("template/img/core-img/leaft.png") }}" alt="">
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>ENTRER EN CONTACT</h2>
                        <p>Envoyez-nous un message, nous vous rappellerons plus tard</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="{{ route('contact.messages.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" name="name" placeholder="Votre nom">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" name="email" placeholder="Votre e-mail">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7944.807046958833!2d10.421631631653211!3d5.355232996115477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105f92650ec63879%3A0x5b8bb33f48320fc3!2sInstitut%20Universitaire%20Des%20Technologies%20Fotso%20Victor%20De%20Bandjoun!5e0!3m2!1sfr!2scm!4v1583234991882!5m2!1sfr!2scm" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection
<script>
    import AddToCart from "../js/components/AddToCart";
    export default {
        components: {AddToCart}
    }
</script>
