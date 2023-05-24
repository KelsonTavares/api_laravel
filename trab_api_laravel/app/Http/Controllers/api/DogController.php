<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Dog as DogResource;
use App\Model\Dog;

class DogController extends Controller
{

    public function index()
    {
        #return Dog::all(); -> The first way to do it.

        # The second way to do it
        $dog = Dog::paginate(15);
        return DogResource::collection($dog);
    }

    # we do not use create function when we create api.
    /*public function create()
    {
        //
    }*/


    public function store(Request $request)
    {
        # The first way to do it.
        Dog::create($request->all());

        # The second way to do it.
        $dog = new Dog;
        $dog->raca = $request->input('raca');
        $dog->nome = $request->input('nome');

        if($dog->save()){
            return new DogResource($dog);
        }

    }


    public function show($id)
    {
        #Dog::findOrFail($id); -> The first way to do it.

        # The second way to do it
        $dog = Dog::findOrFail($id);
        return new DogResource($dog);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        # The first way to do it.
        #$dog = Dog::findOrFail($id);
        #$dog->update($request->all());

        # The second way to do it.
        $dog = Dog::findOrFail($request->id);
        $dog->raca = $request->input('raca');
        $dog->nome = $request->input('nome');

        if($dog->save()){
            return new DogResource($dog);
        }

    }

    function destroy($id)
    {
        # The first way to do it.
        #$dog = Dog::findOrFail($id);
        #$dog->delete();

        # The second way to do it.
        $dog = Dog::findOrFail($id);
        if($dog->delete()){
            return new DogResource($dog);
        }
    }
}
