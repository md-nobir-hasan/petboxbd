<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\MainKey;

class ServiceController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Services"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Services')->show){
            return back();
        }
        $n['services'] = Service::with(['mainKey'])->where('status',1)->orderBy('id','desc')->get();
        return view('backend.pages.setting.service.index',$n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Services')->add){
            return back();
        }
        $n['main_keys'] = MainKey::where('status',1)->orderBy('id','desc')->get();
        return view('backend.pages.setting.service.create',$n);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        if(!check('Services')->add){
            return back();
        }
        Service::create($request->all())->only('name','main_key_id','checking');
        return redirect()->route('setting.setup.services.index')->with('success',$request->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        if(!check('Services')->edit){
            return back();
        }
        $n['main_keys'] = MainKey::where('status',1)->orderBy('id','desc')->get();
        $n['service'] = $service;
        return view('backend.pages.setting.service.edit',$n);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        if(!check('Services')->edit){
            return back();
        }
        $service->name = $request->name;
        $service->main_key_id = $request->main_key_id;
        $service->checking = $request->checking;
        $service->save();
        return redirect()->route('setting.setup.services.index')->with('success',$request->name.' to '.$request->name.' update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if(!check('Services')->delete){
            return back();
        }
        $service->delete();
        return redirect()->route('setting.setup.services.index')->with('success',$service->name.' deleted successfully');
    }
}
