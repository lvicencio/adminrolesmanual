@extends('layouts.app')

@section('content')
<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Crear un Nuevo Usuario2</div>

                <div class="panel-body">
                  <!-- Mensage de session notification -->
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
                         <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                      </div>
                      <div class="form-group">
                        <label for="name">Nombre</label>
                         <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                      </div>
                      <div class="form-group">
                        <label for="severity">Role</label>
                        <select class="form-control" name="rol">
                          <option value="visita" >Visita</option>
                          <option value="admin" >administrador</option>
                          <option value="cliente" >Cliente</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="password">Contraseña</label>
                         <input type="text" class="form-control" name="password" value="{{ old('password') }}">
                      </div>

                <div class="row">
                  <div class="col-md-6">


                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Registrar Usuario Nuevo</button>
                      </div>
                    </form>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                      <a href="/admin" class="btn btn-sm btn-success" title="Nuevo Usuario">Volver</a>
                    </div>
                  </div>


                  </div>

                </div>
            </div>
          </div>
@endsection
