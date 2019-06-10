@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">


                    <div class="row col-md-offset-1">

                        <form class="form-horizontal col-sm-6" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div><img class="img-responsive center-block" src={{asset('assets_register/logo.svg')}}>
                            </div>
                            <div class="panel-heading"><h1><strong>Crea tu cuenta</strong></h1></div>


                            <div class="col-sm-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Nombre completo</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="">Email</label>


                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class= "col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="">Contraseña</label>


                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="col-md-12 form-group ">

                                    <button type="submit" class="btn btn-primary btn-group-justified">
                                        Register
                                    </button>
                            </div>
                        </form>
                        <div class="col-sm-6"><img class="img-responsive center-block"
                                                   src={{asset('assets_register/henry-be-803712-unsplash.jpg')}}></div>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/checkEmail.js') }}"></script>


    </div>
@endsection
