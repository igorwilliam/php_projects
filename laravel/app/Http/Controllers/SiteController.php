<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recurso;
use Session;

class SiteController extends Controller
{
    public function home(Recurso $recurso){

      if(!Session::has('email')){
        return redirect('login');
      }
      // return Session::pull('isAdm');
      if (Session::get('isAdm')== 0) {
        return redirect('login');
        // code...
      }
      $recursos = $recurso->all();
      return view('site.home.index', compact('recursos'));

    }
    public function homeUser(Recurso $recurso){

      if(!Session::has('email')){
        return redirect('login');
      }
      // return Session::pull('isAdm');
      if (Session::get('isAdm')==1) {
        return redirect('login');
        // code...
      }

      $recursos = $recurso->all();
      return view('site.home.indexUser', compact('recursos'));

    }

    public function login(){
      return view('site.login.index');
    }

    public function cadastro(){
      return view('site.cadastro.index');
    }


}
