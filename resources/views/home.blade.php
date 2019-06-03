@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div><img src={{asset('assets_register/logo.svg')}} width="200" height="100"></div>
                <div class="panel-heading">
                    <img src={{asset('assets_register/check-circle.svg')}}>
                    <h1>Cuenta creada</h1>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   Bienvenido a BookStore. Ya puedes acceder <br>a tu catálogo personalizado de libros.<br><br>
                        <form class="form-horizontal" method="GET" action="/payment">
                            {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="CONTINUAR">
                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"><img src={{asset('assets_register/henry-be-803712-unsplash.jpg')}} width="300" height="478"></div>
    </div>
</div>
@endsection
