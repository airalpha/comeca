@extends('layouts.template')

@section('extra-script')
    <!-- Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
             style="background-image: url(template/img/bg-img/24.jpg);">
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
                        <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="first_name">Nom *</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Addresse *</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email_address" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone_number" min="0"
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="city">Ville *</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city') }}">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="country">Pays</label>
                                    <select class="custom-select d-block w-100" disabled="disabled" id="country">
                                        <option selected>Cameroun</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Plus de details</label>
                                    <textarea class="form-control @error('order_notes') is-invalid @enderror"
                                              id="order-notes" cols="30" rows="10"
                                              placeholder="Dites nous plus precisement ou vous etes et comment vous voulez être livrés."
                                              name="order_notes"  >{{ old('order_notes') }}
                                    </textarea>
                                    @error('order_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="card">Numero de carte *</label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
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

@section('extra-js')
    <script>
        // Create a Stripe client.
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Dosis", sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            options = {
                name: document.getElementById('name').value,
            };

            stripe.createToken(card, options).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
