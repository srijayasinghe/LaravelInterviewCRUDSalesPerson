<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function listAction(){
        return view('sales.listSalesPerson');
    }

    public function editAction($id){
        $person = People::find($id);
        return view('sales.EditSalesPerson',['person'=>$person]);

    }

    public function createAction(){
        return view('sales.addSalesPerson');
    }

}
