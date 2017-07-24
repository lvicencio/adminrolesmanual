<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::paginate(10);
      return view('admin.index')->with(compact('users'));
    }

    public function buscador(Request $request)
    {
      $name = $request -> input('name');
      $users = User::Buscador($name)->paginate(10);
      return view('admin.index')->with(compact('users'));
    }
    // public function buscador(Request $request)
    // {
    //   //$users = User::all();
    //   $name = $request -> input('name');
    //   $users = User::Buscador($name)->get();
    //   return view('admin.users')->with(compact('users'));
    // }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       $rules=[
         'name'      => 'required|max:255',
         'email'     => 'required|email|max:255|unique:users',
         'password'  => 'required|min:6'
       ];
       $messages=[
         'name.required'  =>'Ingrese Nombre del Usuario',
         'name.max'      =>'El nombre es demasiado largo',
         'email.required' =>'El Correo es obligatorio',
         'email.max'     =>'El correo es demasiado largo',
         'email.unique'  =>'Este Correo ya se encuentra registrado',
         'password.required'=>'Ingrese su Contraseña',
         'password.min'  =>'La contraseña debe tener minimo 6 caracteres'
       ];

       $this->validate($request,$rules,$messages);

       $user = new User();
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->rol = $request->input('rol');
       $user->password = bcrypt($request->input('password'));
       $user->role = 1;

       $user->save();
       //dd($request->all());
       return back()->with('notification', 'usuario registrado de manera correcta');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       $user = User::find($id);
       return view('admin.edit')->with(compact('user'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules=[
        'name'      => 'required|max:255',
        'email'     => 'required|email|max:255',
        'password'  => 'min:6'
      ];
      $messages=[
        'name.required'  =>'Ingrese Nombre del Usuario',
        'name.max'      =>'El nombre es demasiado largo',
        'email.required' =>'El Correo es obligatorio',
        'email.max'     =>'El correo es demasiado largo',
        'password.min'  =>'La contraseña debe tener minimo 6 caracteres'
      ];
      $this->validate($request,$rules,$messages);

      $user = User::find($id);
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->rol = $request->input('rol');

      $password = $request->input('password');
      // si esta ingresada una nueva contraseña, hacer lo sgte
      if ($password) {
        $user->password= bcrypt($password);
      }
      $user->save();

      return back()->with('notification', 'usuario Editado de manera correcta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
     {
       $user = User::find($id);
       $user ->delete();

       return back()->with('notification', 'El Usuario se ha Eliminado');
     }
}
