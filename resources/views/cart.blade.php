@extends('layouts.template')

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(/template/img/bg-img/24.jpg);">
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Prodiuts</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse(Cart::content() as $product)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{ $product->model->images[0]->path }}"></a>
                                        <h5>{{ $product->model->name }}</h5>
                                    </td>
                                    <td class="qty">
                                        <div class="quantity">
                                            {{--<span class="qty-minus" onclick="var effect = document.getElementById('{{ $product->rowId }}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>--}}
                                            <input type="number" class="qty-text" id="qty" data-id="{{ $product->rowId }}" step="1" min="1" max="{{ $product->model->quantity }}" name="quantity" value="{{ $product->qty }}">
                                            {{--<span class="qty-plus" onclick="var effect = document.getElementById('{{ $product->rowId }}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>--}}
                                        </div>
                                    </td>
                                    <td class="price"><span>{{ $product->model->price }} FCFA</span></td>
                                    <td class="total_price"><span>{{ getPriceQty($product->price, $product->qty) }} FCFA </span></td>
                                    <td class="action"><cart-delete-item :row-id="'{{ $product->rowId }}'"></cart-delete-item></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Votre panier est vide</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Coupon Discount -->
                <div class="col-12 col-lg-6">
                    <div class="coupon-discount mt-70">
                        <h5>COUPON</h5>
                        @if(checkSession())
                            <p class="text-primary"> Un coupon est déja appliqué </p>
                            <form action="{{ route("discount.delete") }}" method="post">
                                @csrf
                                <div class="d-flex justify-content-between col-md-10 offset-1 border-top">
                                    <h5 class="text-success">
                                        {{ request()->session()->get('discount')['code'] }}<br>
                                        <span class="text-sm">- {{ getPrice(request()->session()->get('discount')['remise']) . " FCFA" }}</span>
                                    </h5>
                                    <button type="submit"><i class="fas fa-trash btn text-danger"></i></button>
                                </div>
                            </form>
                        @else
                        <p>Les coupons peuvent être appliqués dans le panier avant le paiement.
                            Ajoutez un article éligible sur le stand du vendeur qui a créé le code promo dans votre panier.
                            Cliquez sur le bouton vert "Appliquer le code" pour ajouter le coupon à votre commande.
                            Le total de la commande sera mis à jour pour indiquer les économies spécifiques au code promo saisi.</p>
                        <form action="{{ route("discount.store") }}" method="post">
                            @csrf
                            <input type="text" name="code" placeholder="Entrer votre coupon">
                            <button type="submit">APPLIQUER</button>
                        </form>
                        @endif
                    </div>
                </div>

                <!-- Cart Totals -->
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-70">
                        <h5 class="title--">Total Panier</h5>

                        <div class="subtotal d-flex justify-content-between">
                            <h5>Sous-total</h5>
                            <h5>
                                {{ checkSession()
                        ? getPrice(getDiscountSubTotalPrice(Cart::subtotal(), request()->session()->get('discount')['remise']))
                        : getPrice(Cart::subtotal()) }}
                               FCFA</h5>
                        </div>
                        {{--<div class="shipping d-flex justify-content-between">
                            <h5>Shipping</h5>
                            <div class="shipping-address">
                                <form action="#" method="post">
                                    <select class="custom-select">
                                        <option selected>Country</option>
                                        <option value="1">USA</option>
                                        <option value="2">Latvia</option>
                                        <option value="3">Japan</option>
                                        <option value="4">Bangladesh</option>
                                    </select>
                                    <input type="text" name="shipping-text" id="shipping-text" placeholder="State">
                                    <input type="text" name="shipping-zip" id="shipping-zip" placeholder="ZIP">
                                    <button type="submit">Update Total</button>
                                </form>
                            </div>
                        </div>--}}
                        <div class="total d-flex justify-content-between">
                            <h5>Tax</h5>
                            <h5>
                                {{ checkSession()
                        ? getPrice(getDiscountTax(Cart::subtotal(), request()->session()->get('discount')['remise']))
                        : getPrice(Cart::tax()) }}
                            </h5>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>
                                {{ checkSession()
                        ? getPrice(getDiscountTotalPrice(Cart::subtotal(), request()->session()->get('discount')['remise']))
                        : getPrice(Cart::total()) }} FCFA
                            </h5>
                        </div>
                        @if(Cart::count() > 0)
                        <div class="checkout-btn">
                            <a href="{{ route('checkout.index') }}" class="btn alazea-btn w-100">PROCEDER AU PAYMENT</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ##### Cart Area End ##### -->
@endsection

@section('extra-js')
    <script>
        let selects = document.querySelectorAll("#qty");
        Array.from(selects).forEach((element) => {
            element.addEventListener('change', function() {
                let rowId = this.getAttribute("data-id");
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch(
                    `/api/cart/${rowId}`,
                    {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'PATCH',
                        body: JSON.stringify({
                            qty: this.value
                        })
                    }
                ).then((data) => {
                    console.log(data);
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                });
            })
        })
    </script>
@endsection
