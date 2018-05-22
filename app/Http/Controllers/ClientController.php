<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Departament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterClientRequest;

class ClientController extends Controller
{
    public function home(){
      $states = Departament::all();

      return view('index',compact('states'));
    }

    public function index(){
      $clients = Client::with('state','city')->get();

      return view('list',compact('clients'));
    }

    public function store(RegisterClientRequest $request){

      Client::create([
          'name' => $request->get('name'),
          'last_name' => $request->get('last_name'),
          'identification' => $request->get('identification'),
          'state' => $request->get('state'),
          'city' => $request->get('city'),
          'phone' => $request->get('phone'),
          'email' => $request->get('email')
      ]);

      return redirect()->to('/clients')->with('message',array('type' => 'success' , 'message' => 'Cliente Registrado Correctamente'));
    }

    public function cities($id){
      $cities = City::where('Departament_id',$id)->get();;

      return response()
        ->json([
          'cities'   => $cities,
          'status'  => 200
        ]);
    }
}
