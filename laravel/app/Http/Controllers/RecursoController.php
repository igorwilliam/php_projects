<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recurso;
use Session;

class RecursoController extends Controller
{

    public function __construct(Recurso $recurso){
      $this->recurso = $recurso;

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
      // return Session::pull('isAdm');
      if (Session::get('isAdm')== 0) {
        return redirect('login');
        // code...
      }
      return view('site.recurso.cadastro-editar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if (Session::get('isAdm')== 0) {
        return redirect('login');
        // code...
      }


        $dataForm = $request->except('_token');

        $insert = $this->recurso->insert($dataForm);

        return redirect('/');

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

      if (Session::get('isAdm')== 0) {
        return redirect('login');
        // code...
      }


        $recurso = $this->recurso->find($id);
        return view('site.recurso.cadastro-editar',compact('recurso'));
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

      if (Session::get('isAdm')== 0) {
        return redirect('login');
        // code...
      }


      $dataForm = $request->except('_token');

      $recurso = $this->recurso->find($id);

      $update = $recurso->update($dataForm);
      return redirect('/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Session::get('isAdm')== 0) {
        return redirect('login');
        // code...
      }


      $recurso = $this->recurso->find($id);
      $delete = $recurso->delete();
      return redirect('/');

    }
}
