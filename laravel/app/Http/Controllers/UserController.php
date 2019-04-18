<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use Session;

class UserController extends Controller
{
    public function __construct(User $user){
      $this->user = $user;

    }

    public function InserirUsuario(Request $request){

      $dataForm = $request->except('_token');
      $insert = $this->user->insert($dataForm);
      return redirect('cadastro');

    }

    public function loginUsuario(Request $request){

      // $email = $request->input("email");

      $dados = User::where('email', $request->email)->first();

      if (count($dados)==0) {
        $resultado = "nao";
      }else{
        if ($request->password==$dados->password) {

          if ($dados->isAdm == 0) {
            Session::put('email',$dados->email);
            Session::put('isAdm',$dados->isAdm);
            Session::put('id',$dados->id);
            return redirect('/user');
            // code...
          }else {
            Session::put('email',$dados->email);
            Session::put('isAdm',$dados->isAdm);
            Session::put('id',$dados->id);
            return redirect('/');
            // code...
          }

        }else {
        return "NAo logado";
        }
      }


      // dd($users = $this->user->where('email', $email));

    }
    public function logout(){
      Session::flush();
      return redirect('login');
    }
}
