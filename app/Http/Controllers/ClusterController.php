<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use Illuminate\Http\Request;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clusters = Cluster::all();
        return view('cluster.index', compact('clusters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cluster.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Cluster::create($data);
        return redirect()->route('cluster.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cluster $cluster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cluster $cluster)
    {
        return view('cluster.edit', compact('cluster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cluster $cluster)
    {
        $cluster->update($request->all());
        return redirect()->route('cluster.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cluster $cluster)
    {
        $cluster->delete();
        return redirect()->route('cluster.index');
    }
}
