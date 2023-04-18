<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware(['auth',"check:Page"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check('Page')->show){
            return back();
        }

        $n['pages'] = Page::where('status',1)->orderBy('id','desc')->get();
        return view('backend.pages.page.index',$n);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check('Page')->add){
            return back();
        }
    return view('backend.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        if(!check('Page')->add){
            return back();
        }
        Page::create($request->all())->only('title','page_design');
        return redirect()->route('page.index')->with('success',$request->name.' successfylly created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(!check('Page')->edit){
            return back();
        }

        return view('backend.pages.page.edit',['page' =>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        if(!check('Page')->edit){
            return back();
        }

        $page->update($request->all());
        return redirect()->route('page.index')->with('success',$page->name.' successfylly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(!check('Page')->delete){
            return back();
        }

        $page->delete();
        return redirect()->route('page.index')->with('success',"$page->name Feature successfylly deleted");
    }
}
