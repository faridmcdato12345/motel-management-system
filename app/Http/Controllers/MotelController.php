<?php

namespace App\Http\Controllers;

use App\Models\Motel;
use Illuminate\Http\Request;

class MotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Motel/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Motel $motel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motel $motel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motel $motel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motel $motel)
    {
        //
    }
}
