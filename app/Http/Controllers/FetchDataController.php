<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DataTables;

class FetchDataController extends Controller
{
    public function index(){
    	return view('frontendmain.viewtodos');
    }

	public function fetchTodos(){
		$todos = Http::get('https://jsonplaceholder.typicode.com/todos')->json();
		$collection = collect($todos);
		$userId = $collection->unique('userId');
		$countUnique = $collection->countBy('userId');
        if($todos) {
            return Datatables::of($todos)
            		->addIndexColumn()
            		->make(true);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
	}




}
