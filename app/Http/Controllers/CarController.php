<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\APIPaginateCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = $request->per_page ? $request->per_page : 10;
        $currentPage = $request->current_page ? $request->current_page : 1;
        
        $cars = Car::paginate($perPage, ["*"], "page", $currentPage);
        $response = new APIPaginateCollection($cars, CarResource::class);
        return response()->json($response);
    }

    /**
     * Create new Car
     */public function createNew()
     {
        return view('create_car');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $car = Car::create($request->only("registration_license","brand","model","manufacture_date","description","category_id","slug"));
        $slug_brand = Str::slug($car->brand,'_');
        $slug_model = Str::slug($car->model,'_');
        $slug_license = Str::slug($car->registration_license,'_');
        $car->slug = $slug_brand."-".$slug_model."-".$slug_license;
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        $response = new CarResouce($car);
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->only("registration_license","brand","model","manufacture_date","description","category_id"));
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return response()->json(["data" => [
            "success" => true
        ]]);
    }
}
