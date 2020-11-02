<?php

namespace App\Http\Controllers;

use App\Entities\ServiceCenter;
use Illuminate\Http\Request;

class ServiceCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $centers = ServiceCenter::all();

        $binding = [
            'title' => 'Service Centers',
            'centers' => $centers,
        ];

        return view('admin.services.centers.index', $binding);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceCenter  $serviceCenter
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCenter $serviceCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceCenter  $serviceCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCenter $serviceCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceCenter  $serviceCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCenter $serviceCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceCenter  $serviceCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCenter $serviceCenter)
    {
        //
    }
}
