<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\ComboPlan;
use App\Http\Requests\ComboPlanRequest;

class ComboPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = ComboPlan::with('plan')->get();
        return view('combo.list', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Plan::all();
        return view('combo.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComboPlanRequest $request)
    {
        $post = $request->only([ 'name', 'plan_id', 'price']);
        ComboPlan::create($post);
        return redirect()->route('combo.index')
            ->withSuccess(__('Combo plan created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $combo = ComboPlan::find($id);
        $plans = Plan::all();
        if($combo){
            return view('combo.create', compact('combo', 'plans'));
        }
        return redirect()->route('combo.index')
            ->withError(__('Plan not found.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComboPlanRequest $request, ComboPlan $combo)
    {
        $post = $request->only(['name', 'plan_id', 'price']);
        $combo->update($post);
        return redirect()->route('combo.index')
            ->withSuccess(__('Plan updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ComboPlan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = ComboPlan::find($id);

        if ($plan) {
            $plan->delete();
            return redirect()->route('combo.index')
            ->with('success', 'Plan deleted successfully.');
        }
        return redirect()->route('combo.index')
                    ->with('error', 'Plan not found.');
    }
}
