<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\City;
use App\Models\Client;
use App\Models\Departament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterClientRequest;
use Maatwebsite\Excel\Concerns\FromCollection;

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

    public function winner(){
      $clients = Client::all();
      if(count($clients)>= 5){
        $client = Client::all()->random(1)->first();
      }else{
        $client = NULL;
      }
      // dd($client);
      return view('winner',compact('client'));
    }

    public function export(){
      $type = "xlsx";
      $data = Client::get()->toArray();
  		return Excel::create('clients', function($excel) use ($data) {
      			$excel->sheet('lista_clientes', function($sheet) use ($data)
      	        {
      				$sheet->fromArray($data);
      	        });
      		})->download($type);
    }
}
