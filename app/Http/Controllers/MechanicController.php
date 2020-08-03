<?php

namespace App\Http\Controllers;

use App\Mechanic;
use Validator;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanics = Mechanic::orderBy('name')->orderBy('surname')->limit(29)->get();

       return view('mechanic.index', ['mechanics' => $mechanics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //requesto objektas, kuriame yra visi duomenys, kuriuos gali tik narsykle siusti. Pries paleidzian sita meoda ji yra reflektinamas - tiriamas - ziuri, kokiu praso aargumentu. siuo atveju mums reikia ideti duomenus, todel iesko requesto
    {
        $validator = Validator::make($request->all(),
        [
            'mechanic_name' => ['required', 'min:3', 'max:64'],
            'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ],
            [
            'mechanic_name.min' => 'Įveskite teisingą vardą',
            'mechanic_surname.min' => 'Įveskite teisingą pavardę'
            ]
                    );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
            // return redirect()->back();
        }
 

        $mechanic = new Mechanic;
        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->portret = '';

        if ($request->hasFile('portret')) {
            $image = $request->file('portret');
            $name = $request->file('portret')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $mechanic->portret = $name;
        }

        $mechanic->save();
        return redirect()->route('mechanic.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        return view('mechanic.show', ['mechanic' => $mechanic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanic.edit', ['mechanic' => $mechanic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->portret = '';

        // dd($request->file('portret')->getClientOriginalName());

        if ($request->hasFile('portret')) {
            $image = $request->file('portret');
            $name = $request->file('portret')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $mechanic->portret = $name;
        }
        else {
        return redirect()->route('mechanic.index')->with('success_message', 'Sėkmingai pakeistas.');
        }
        
        $mechanic->save();
        return redirect()->route('mechanic.index')->with('success_message', 'Sėkmingai pakeistas.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if($mechanic->mechanicTrucks->count()){
            return redirect()->route('mechanic.index')->with('alert_message', 'Turi '.$mechanic->mechanicTrucks->count().' sunkvezimius, trinti negalima'); 
        }

        $mechanic->delete();
        return redirect()->route('mechanic.index')->with('success_message', 'Sekmingai ištrintas.');

    }
}
