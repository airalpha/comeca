@extends('layouts.template')

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(template/img/bg-img/24.jpg);">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Details de payement</h5>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="first_name">Nom *</label>
                                    <input type="text" class="form-control" name="name" id="first_name" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Addresse *</label>
                                    <input type="email" class="form-control" name="email" id="email_address" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="number" class="form-control" name="phone" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="city">Ville *</label>
                                    <input type="text" class="form-control" name="city" id="city" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="country">Pays</label>
                                    <select class="custom-select d-block w-100" disabled="disabled" id="country">
                                        <option selected>Cameroun</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Plus de details</label>
                                    <textarea class="form-control"
                                              id="order-notes" cols="30" rows="10"
                                              placeholder="Dites nous plus precisement ou vous etes et comment vous voulez être livrés.">
                                    </textarea>
                                </div>
                            </div>
                            <button class="btn alazea-btn w-100" type="submit">Payer</button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">Votre Commande</h5>
                        <div class="products">
                            <div class="products-data">
                                <h5>Produits:</h5>
                                @foreach(Cart::content() as $product)
                                <div class="single-products d-flex justify-content-between align-items-center">
                                    <p>{{ $product->model->name }}</p>
                                    <h5>{{ getPrice($product->price) }} FCFA</h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>Sous total</h5>
                            <h5>{{ Cart::subtotal() }} FCFA</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Transport</h5>
                            <h5>0.00 FCFA</h5>
                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Total</h5>
                            <h5>{{ Cart::total() }} FCFA</h5>
                        </div>
                        <div class="checkout-btn mt-30">
                            <a href="#" class="btn alazea-btn w-100">Payer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
