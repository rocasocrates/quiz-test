@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="row col-md-offset-1">

                        <div class="panel-heading col-sm-6">
                            <img class="img-responsive " src={{asset('assets_register/logo.svg')}}>
                            <h1><strong>Pedido</strong></h1>
                            <h3><strong>Libros</strong></h3>
                            <ul class="list-group ">
                                <li class="list-group-item ">
                                    <div><span>No me hagas pensar.Una aproximación a la usabilidad en la web</span>
                                        <strong>15€</strong></div>

                                  <p><span>Steve Krug</span></p>
                                </li>
                                <li class="list-group-item ">
                                    <div><span>Lean UX: Cómo aplicar los principios Lean a la mejora de la
                                            experiencia usuario </span><strong>15€</strong>
                                    </div>
                                    <p> <span>Jetf Gothelf</span></p></li>
                                <li class="list-group-item ">
                                    <div><span>Sprint: El método para resolver problemas y testar nuevas
                                            ideas en solo 5 dias </span><strong>15€</strong>
                                       </div>
                                    <p><span>Jake Knapp, John Zeratsky</span></p></li>

                            </ul>
                            <h3>Total</h3>
                            <h1>45€</h1>

                        </div>

                        <form accept-charset="UTF-8" action="/payment"
                              class="require-validation form-horizontal col-sm-6"
                              data-cc-on-file="false"
                              data-stripe-publishable-key="pk_test_1oEBXV9O2Q3qeQ7tTj9DsbWP00QCTyMiT3"
                              id="payment-form" method="post">
                            {{ csrf_field() }}
                            {{-- <div class='form-row'>
                                 <div class='col-xs-12 form-group required'>
                                     <label class='control-label'>Name on Card</label> <input
                                             class='form-control' size='4' type='text'>
                                 </div>
                             </div>--}}
                            <div class='form-row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Número de tarjeta</label> <input
                                            autocomplete='off' class='form-control card-number' size='20'
                                            type='text'>
                                </div>
                            </div>
                            <div class="form-row" style="opacity: 0.5">
                                <div class='col-xs-12 form-group card required'>
                                    <img src="{{asset('assets_register/card-visa.svg')}}" alt="">
                                    <img src="{{asset('assets_register/card-mastercard.svg')}}" alt="">
                                    <img src="{{asset('assets_register/card-amex.svg')}}" alt="">
                                </div>

                            </div>
                            <div class='form-row bg-transparent'>
                                <div class='col-xs-4 form-group expiration required'>
                                    <label class='control-label'>Fecha de </label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                </div>
                                <div class='col-xs-4 form-group expiration required'>
                                    <label class='control-label'>caducidad </label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                </div>

                                <div class='col-xs-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                    class='form-control card-cvc'
                                                                                    placeholder='000' size='4'
                                                                                    type='text'>
                                </div>
                            </div>
                            {{--    <div class='form-row'>
                                    <div class='col-md-12'>
                                        <div class='form-control total btn btn-info'>
                                            Total: <span class='amount'>$300</span>
                                        </div>
                                    </div>
                                </div>--}}
                            <div class='form-row'>
                                <div class='col-md-12 form-group'>
                                    <button class='form-control btn btn-primary submit-button'
                                            type='submit' style="margin-top: 10px;">Realizar pago
                                    </button>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if ((Session::has('success-message')))
                            <div class="alert alert-success col-md-12">{{Session::get('success-message')}}</div>
                        @endif @if((Session::has('fail-message')))
                            <div class="alert alert-danger col-md-12">{{Session::get('fail-message')}}</div>
                        @endif
                        <script>
                            $(function () {
                                $('form.require-validation').bind('submit', function (e) {
                                    var form = $(e.target).closest('form'),
                                        inputSelector = ['input[type=email]', 'input[type=password]',
                                            'input[type=text]', 'input[type=file]',
                                            'textarea'].join(', '),
                                        inputs = $('form').find('.required').find(inputSelector),
                                        errorMessage = $('form').find('div.error'),
                                        valid = true;

                                    errorMessage.addClass('hide');
                                    $('.has-error').removeClass('has-error');
                                    inputs.each(function (i, el) {
                                        var input = $(el);
                                        if (input.val() === '') {
                                            input.parent().addClass('has-error');
                                            errorMessage.removeClass('hide');
                                            e.preventDefault(); // cancel on first error
                                        }
                                    });
                                });

                                $('form').on('submit', function (e) {


                                    if (!$('form').data('cc-on-file')) {
                                        e.preventDefault();
                                        Stripe.setPublishableKey('pk_test_1oEBXV9O2Q3qeQ7tTj9DsbWP00QCTyMiT3');
                                        //  var elements = stripe.elements();
                                        Stripe.createToken({
                                            number: $('.card-number').val(),
                                            cvc: $('.card-cvc').val(),
                                            exp_month: $('.card-expiry-month').val(),
                                            exp_year: $('.card-expiry-year').val()
                                        }, stripeResponseHandler);
                                    }
                                });

                                function stripeResponseHandler(status, response) {
                                    if (response.error) {
                                        $('.error')
                                            .removeClass('hide')
                                            .find('.alert')
                                            .text(response.error.message);
                                    } else {
                                        // token contains id, last4, and card type
                                        var token = response['id'];
                                        // insert the token into the form so it gets submitted to the server
                                        $('form').find('input[type=text]').empty();
                                        $('form').append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");
                                        $('form').get(0).submit();
                                    }
                                }
                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection