<?php

namespace App\Http\Controllers;

use App\Mechanic;
use App\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
             
        $mechanics = Mechanic::all();
        $selectId = 0;
        $sort = '';

        if ($request->mechanic_id) {
            if ($request->sort) {
                if ($request->sort == 'maker') {
                    $trucks = Truck::where('mechanic_id', $request->mechanic_id)->orderBy('maker')->get();
                    $sort = 'maker';
                }
                elseif ($request->sort == 'plate') {
                    $trucks = Truck::where('mechanic_id', $request->mechanic_id)->orderBy('plate')->get();
                    $sort = 'plate';
                }
                elseif ($request->sort == 'make_year') {
                    $trucks = Truck::where('mechanic_id', $request->mechanic_id)->orderBy('make_year')->get();
                    $sort = 'make_year';
                }
                else {
                    $trucks = Truck::all();
                }
            }
            else {
                $trucks = Truck::where('mechanic_id', $request->mechanic_id)->get();
            }
            $selectId = $request->mechanic_id;
        }

        else {
            if ($request->sort) {
                if ($request->sort == 'maker') {
                    $trucks = Truck::orderBy('maker')->get();
                    $sort = 'maker';
                }
                elseif ($request->sort == 'plate') {
                    $trucks = Truck::orderBy('plate')->get();
                    $sort = 'plate';
                }
                elseif ($request->sort == 'make_year') {
                    $trucks = Truck::orderBy('make_year')->get();
                    $sort = 'make_year';
                }
                else {
                    $trucks = Truck::all();
                }
            }
            else {
                $trucks = Truck::all();
            }
        }

        


        return view('truck.index', compact('trucks','mechanics', 'selectId', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trucks = Truck::all();
        $mechanics = Mechanic::all();
        return view('truck.create', compact('trucks', 'mechanics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $truck = new Truck;
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('truck.show', ['truck' => $truck, 'mechanics' => $mechanics]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('truck.edit', ['truck' => $truck, 'mechanics' => $mechanics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
       
        return redirect()->route('truck.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
