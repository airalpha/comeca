@extends('layouts.template')

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(/template/img/bg-img/24.jpg);">
            <h2>NOUS CONTACTER</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="/template/img/bg-img/25.jpg" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>NOUS CONTACTER</h2>
                        <p>Nous améliorons nos services pour mieux vous servir.</p>
                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">
                        <p><span>Address:</span> Bandjoun, Djak</p>
                        <p><span>Phone:</span> +237 697 456 833</p>
                        <p><span>Email:</span> comeca@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->

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
