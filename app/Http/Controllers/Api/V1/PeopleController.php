<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PeopleInterface;

class PeopleController extends Controller
{
    public function createAction(PeopleInterface $peopleInterface, Request $request){
         $peopleInterface->create($request);
        return redirect()->route('salesPersonList');
    }

    public function editAction(PeopleInterface $peopleInterface, Request $request){
         $peopleInterface->update($request);
        return redirect()->route('salesPersonList');
    }

    public function deleteAction($id, PeopleInterface $peopleInterface){
        return $peopleInterface->delete($id);
    }


    public function listAction(PeopleInterface $peopleInterface){
        return $peopleInterface->list();
    }

    public function viewAction($id, PeopleInterface $peopleInterface){
        return $peopleInterface->view($id);
    }


}
