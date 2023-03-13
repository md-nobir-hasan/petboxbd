<?php

namespace App\Http\Controllers;

use App\Models\MainKey;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMainKeyRequest;
use App\Http\Requests\UpdateMainKeyRequest;

class MainKeyController extends Controller
{

    public function __construct() {
        $this->middleware(['auth',"check:Main Keys"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Main Keys')->show){
            return back();
        }

        $n['main_keys'] = MainKey::where('status', 1)->orderBy('id','desc')->get();
        return view('backend.pages.setting.main-key.index', $n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Main Keys')->add){
            return back();
        }
        return view('backend.pages.setting.main-key.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMainKeyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainKeyRequest $request)
    {
        if (!check('Main Keys')->add) {
            return back();
        }
        MainKey::create($request->all())->only('name');
        return redirect()->route('setting.setup.key.index')->with('success', $request->name . ' successfylly created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainKey  $mainKey
     * @return \Illuminate\Http\Response
     */
    public function show(MainKey $mainKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainKey  $mainKey
     * @return \Illuminate\Http\Response
     */
    public function edit(MainKey $mainKey)
    {
        if (!check('Main Keys')->edit) {
            return back();
        }

        return view('backend.pages.setting.main-key.edit', ['main_keys' => $mainKey]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMainKeyRequest  $request
     * @param  \App\Models\MainKey  $mainKey
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMainKeyRequest $request, MainKey $mainKey)
    {
        if (!check('Main Keys')->edit) {
            return back();
        }

        $mainKey->update($request->all());
        return redirect()->route('setting.setup.key.index')->with('success', $mainKey->name . ' successfylly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainKey  $mainKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainKey $mainKey)
    {
        if (!check('Main Keys')->delete) {
            return back();
        }

        $mainKey->delete();
        return redirect()->route('setting.setup.key.index')->with('success', "$mainKey->name  successfylly deleted");
    }
}
