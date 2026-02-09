<?php

namespace App\Http\Controllers;

use App\Models\Guides;
use Illuminate\Http\Request;

class GuidesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = Guides::all();
        return view('guides.index', compact('guides'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Guides $guides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guides $guides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guides $guides)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($guides_id)
    {
        $guides = Guides::find($guides_id);
        $guides->delete();
        return redirect()->route('guides.index');
    }
}
