<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Reserva;
use App\User;
use App\Recurso;
use Session;

class ReservaController extends Controller
{

    public function __construct(Reserva $reserva){
      $this->reserva = $reserva;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

       $dataForm = $request->except('_token');

       $date = $request->input('data');
       $recurso_id = $request->recurso_id;

       $dateLimit = date('Y-n-d', strtotime("+8 day"));

      $confere_conflito = 0;


      $datas = $this->reserva->all();


      foreach ($datas as $key) {
        // return $key->data. " rrr  ".$date;
        if ($key->data==$date) {
          if($request->recurso_id==$key->recurso_id){
            $confere_conflito=1;

          }
        }
      }

      (int)$d0 = strtotime($date);
      (int)$d1 = strtotime($dateLimit);

      // return $confere_conflito;

       if ($d0<$d1 and $confere_conflito==0 ) {
         $insert = $this->reserva->insert($dataForm);
         return redirect('/user');

       }else {
         return "Data Reserva Inválida";
       }

       // $recurso = $this->recurso->find($id);
       //
       // return redirect('/');
       // $update = $recurso->update($dataForm);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      if (Session::get('isAdm')== 1) {
        return redirect('login');
        // code...
      }

      $reservas = $this->reserva->all();
      $users = user::all();
      $recursos = recurso::all();

      return view('site.home.reservas',compact('recursos','users','reservas','id'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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


     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
