@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div><img src={{asset('assets_register/logo.svg')}} width="200" height="100"></div>
                    <div class="panel-heading">Pedido #000000</div>

                    <div class="panel-body">

                        <h2>No me hagas pensar. Una aproximación a la usabilidad en la web</h2>&nbsp;<b>15€</b>
                        <h2>No me hagas pensar. Una aproximación a la usabilidad en la web</h2>&nbsp;<b>15€</b>
                        <h2> me hagas pensar. Una aproximación a la usabilidad en la web</h2>&nbsp;<b>15€</b>
                    </div>
                    <h2>Total</h2>
                </div>
            </div>
            <p>Número de tarjeta</p>
            <p>0000 0000 0000 0000</p>
            <p>
            <img src={{asset('assets_register/card-amex.svg')}} width="50" height="25">
            <img src={{asset('assets_register/card-mastercard.svg')}} width="50" height="25">
            <img src={{asset('assets_register/card-visa.svg')}} width="50" height="25">
            </p>
            <p>Fecha de caducidad   CVC</p>
            <div class="row-md-3">
           <p class="d-flex justify-content-center">
               <input type="month" size="2" class="p-2">
               <input type="number" min="19" size="2" class="p-2">
               <input type="number"size="3" class="p-2">
           </p>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="sk_test_a0REUpdIPJMIdTJI07s7oiIo00rLqpcFR4="
                        data-amount="1500"
                        data-name="Pago mensual"
                        data-description="10.00 $ "
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png">
                </script>
            </form>
        </div>
    </div>

@endsection