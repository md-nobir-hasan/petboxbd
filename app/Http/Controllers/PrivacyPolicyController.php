<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrivacyPolicyRequest;
use App\Http\Requests\UpdatePrivacyPolicyRequest;

class PrivacyPolicyController extends Controller
{

    public function __construct() {
        $this->middleware(['auth',"check:features"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if(!check('Features')->show){
            return back();
        }

        $n['features'] = Feature::where('status',1)->orderBy('id','desc')->get();
        return view('backend.pages.setting.feature.index',$n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Features')->add){
            return back();
        }
    return view('backend.pages.setting.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrivacyPolicyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrivacyPolicyRequest $request)
    {
        if(!check('Features')->add){
            return back();
        }
        Feature::create($request->all())->only('name');
        return redirect()->route('setting.feature.index')->with('success',$request->name.' successfylly created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivacyPolicy $privacyPolicy)
    {
        if(!check('Features')->edit){
            return back();
        }

        return view('backend.pages.setting.feature.edit',['feature' =>$feature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrivacyPolicyRequest  $request
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrivacyPolicyRequest $request, PrivacyPolicy $privacyPolicy)
    {
        if(!check('Features')->edit){
            return back();
        }

        $feature->update($request->all());
        return redirect()->route('setting.feature.index')->with('success',$feature->name.' successfylly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        if(!check('Features')->delete){
            return back();
        }

        $feature->delete();
        return redirect()->route('setting.feature.index')->with('success',"$feature->name Feature successfylly deleted");
    }
}
