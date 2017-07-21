@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel Administrador</div>

                <div class="panel-body">
                    <h1>Administrador</h1>
                    <br>
                    @if (session('notification') )
                      <div class="alert alert-success">
                        {{ session('notification') }}
                      </div>
                    @endif
                    <!-- Errores de validaciones -->
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>

                    @endif

                    <form action="" method="POST">
                       {{ csrf_field() }}

                      <div class="form-group">
                        <label for="email">Correo Electronico</label>
                         <input type="email" class="form-control" name="email"  value="{{ old('email', $user->email) }}">
                          <!--  <input type="email" class="form-control" name="email" readonly value="{{ old('email') }}"> -->
                      </div>
                      <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name ) }}">

                      </div>
                      <div class="form-group">
                        <label for="severity">Rol</label>
                        <select class="form-control" name="rol">
                          <option value="admin" @if ($user->rol == 'admin')
                            selected
                          @endif>Administrador</option>
                          <option value="cliente" @if ($user->rol == 'cliente')
                            selected
                          @endif>Cliente</option>
                          <option value="visita" @if ($user->rol == 'visita')
                            selected
                          @endif>Visita</option>
                        </select>
                      </div>

                     <div class="form-group">
                        <label for="password">Contraseña <em>(Ingresar solo si se desea cambiar)</em></label>
                         <input type="text" class="form-control" name="password" value="{{ old('password') }}">
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Editar Usuario</button>
                      </div>
                    </form>




                </div>



            </div>
        </div>
    </div>
</div>
@endsection
