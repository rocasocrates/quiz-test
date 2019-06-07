@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="col-sm-6">
                    <div><img class="img-responsive center-block" src={{asset('assets_register/logo.svg')}}></div>

                    <div class="panel-heading">

                        <img class="img-responsive center-block" src={{asset('assets_register/check-circle.svg')}}>
                        <div class="panel-heading col-md-offset-2">
                            <h1><strong>Cuenta creada</strong></h1>
                        </div>

                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('confirmation'))
                        <div class="alert alert-success">
                            <h1>{{ session('confirmation') }}</h1>
                        </div>
                    @endif
                    <div class="col-md-offset-2">
                        Bienvenido a BookStore. Ya puedes acceder <br>a tu catálogo personalizado de libros.<br><br>
                        <form class="form-horizontal" method="GET" action="/payment">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary btn-group-justified" value="CONTINUAR">
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src={{asset('assets_register/henry-be-803712-unsplash.jpg')}} width="300" height="478">
                </div>
            </div>

        </div>
    </div>
@endsection
