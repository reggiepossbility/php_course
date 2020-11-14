<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\User;
use Illuminate\Http\Request;

class CharityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.charities.index', ['charities' => Charity::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.charities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'venue' => 'required',
            'detail' => 'required',
        ]);

        if ($validated) {

            $charity = Charity::create([
                'name' => $request->name,
                'time' => $request->time,
                'venue' => $request->venue,
                'detail' => $request->detail,
                'user_id'=> auth()->user()->id
            ]);

        }

        return redirect()->route('charities.index')->with('success','建立成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function show(Charity $charity)
    {
        $creator = User::find($charity->user_id);

        return view('categories.charities.show', compact('charity','creator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function edit(Charity $charity)
    {
        return view('categories.charities.edit',compact('charity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charity $charity)
    {
        $charity->update([
            'name' => $request->name,
            'time' => $request->time,
            'venue' => $request->venue,
            'detail' => $request->detail
        ]);

        return redirect()->route('charities.show', $charity)->with('success','更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charity $charity)
    {
        $charity->delete();
        return redirect()->route('charities.index')->with('success','刪除成功');
    }
}
