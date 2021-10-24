<?php

namespace App\Service;

use Exception;
use Illuminate\Http\Request;
use App\Interfaces\PeopleInterface;
use App\Models\People;
use Illuminate\Support\Facades\Validator;

class PeopleService implements PeopleInterface
{
    public function create(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'name'=>'required|string|max:300',
                'email'=> 'required|email',
                'address'=>'required|string',
                'telephone'=>'required|string|max:18',
                'join_date'=> 'required|date',
                'current_route'=>'nullable|string|max:50',
                'comments'=>'nullable|string'
            ]);

            if($validator->fails()){
                return response()->json([
                    'success'=>false,
                    'message'=>$validator->errors()
                ],400);
            }

            $people = new People();
            $people->name = $request->get('name');
            $people->email = $request->get('email');
            $people->address = $request->get('address');
            $people->telephone = $request->get('telephone');
            $people->join_date = $request->get('join_date');
            $people->current_route = $request->get('current_route');
            $people->type = 'sales';
            $people->save();


            return response()->json([
                'success'=>true,
                'message'=> 'Person record successfully created!'
            ],201);


        }catch(Exception $ex){
            //return exception message
            return response()->json([
            'success' =>  false,
            'message' =>  $ex->getMessage(),
            ], 500);
        }

    }
    public function update(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                 'id'=>'required|integer',
                'name'=>'required|string|max:300',
                'email'=> 'required|email',
                'address'=>'required|string',
                'telephone'=>'required|string|max:18',
                'join_date'=> 'required|date',
                'current_route'=>'nullable|string|max:50',
                'comments'=>'nullable|string'
            ]);

            if($validator->fails()){
                return response()->json([
                    'success'=>false,
                    'message'=>$validator->errors()
                ],400);
            }

            $people = People::find($request->get('id'));
            $people->name = $request->get('name');
            $people->email = $request->get('email');
            $people->address = $request->get('address');
            $people->telephone = $request->get('telephone');
            $people->join_date = $request->get('join_date');
            $people->current_route = $request->get('current_route');
            $people->save();

            return response()->json([
                'success'=>true,
                'message'=> 'Person record successfully updated!'
            ],200);

        }catch(Exception $ex){
            //return exception message
            return response()->json([
            'success' =>  false,
            'message' => $ex->getMessage(),
            ], 500);
        }

    }

    public function delete($id){
       try{
            People::find($id)->delete();
            return response()->json([
                'success'=>true,
                'message'=> 'Person record successfully deleted!'
            ],200);
       }catch(Exception $ex){
            //return exception message
            return response()->json([
            'success' =>  false,
            'message' =>  $ex->getMessage(),
            ], 500);
       }

    }

    public function list(){
        try{
            $people = People::where('type','sales')
            ->orderBy('created_at','DESC')->get();

            return response()->json([
                'success'=>true,
                'data'=> $people
            ],200);
        }catch(Exception $ex){
            //return exception message
            return response()->json([
            'success' =>  false,
            'message' =>  $ex->getMessage(),
            ], 500);
        }

    }

    public function view($id){
        try{
            $people = People::find($id);
            return response()->json([
                'success'=>true,
                'data'=> $people
            ],200);
        }catch(Exception $ex){
            //return exception message
            return response()->json([
            'success' =>  false,
            'message' => $this->defaultServerError . ' Error: ' . $ex->getMessage(),
            ], 500);
        }

    }
}
