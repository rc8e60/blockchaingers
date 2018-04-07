<?php

namespace App\Http\Controllers;

use App\Corporation;
use Illuminate\Http\Request;

class CorporationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corporation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // To-do: validation

        $corporation = $request->user()
            ->corporations()
            ->create($request->all());

        return redirect()->action('CorporationController@show', $corporation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function show(Corporation $corporation)
    {
        return view('corporation.show', [
            'corporation' => $corporation->load('users'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporation $corporation)
    {
        $corporation->delete();

        return redirect()->back();
    }
}
