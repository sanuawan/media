<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Sanaullah.user');
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

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;
        $videoPath = $request->file('video') ? $request->file('video')->store('videos', 'public') : null;
        $audioPath = $request->file('audio') ? $request->file('audio')->store('audios', 'public') : null;

        // dd($request);
        $store = new test;
        $store->fname=$request->fname;
        $store->lname=$request->lname;
        $store->image = $imagePath;
        $store->video = $videoPath;
        $store->audio = $audioPath;
        
        $store->save();

        session()->flash('success', 'Your data is submitted successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
        $list= Test::all();
        return view('Sanaullah.list',compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $list = Test::find($request->id);
        return view('Sanaullah.edit',compact('list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
        $test = Test::find($request->id);
        if($test){
            $test->fname=$request->fname;
            $test->lname=$request->lname;

            if ($request->file('image')) {
                $test->image = $request->file('image')->store('images', 'public');
            } 
            // $test->image=$request->imagePath;

            if ($request->file('video')) {
                $test->video = $request->file('video')->store('videos', 'public');
            } 

            // $test->video=$request->videoPath;
            if ($request->file('audio')) {
                $test->audio = $request->file('audio')->store('audios', 'public');
            }
            // $test->audio=$request->audioPath;
            
            $test->update();
            return redirect()->route('Sanaullah.list');
        }
        return redirect()->route('Sanaullah.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $test=Test::destroy($request->id);
        return redirect()->route('Sanaullah.list');
    }
}
