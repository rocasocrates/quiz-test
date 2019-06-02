@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Payment</div>

                    <div class="panel-body">
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
            </div>
        </div>
    </div>

@endsection