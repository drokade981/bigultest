<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityCriteria;
use App\Http\Requests\EligibilityRequest;

class EligibilityCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = EligibilityCriteria::all();
        return view('eligibility.list', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eligibility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EligibilityRequest $request)
    {
        $post = $request->only(['name', 'age_less_than', 'age_greater_than', 'last_login_days_ago', 'income_less_than', 'income_greater_than']);
        EligibilityCriteria::create($post);
        return redirect()->route('eligibility.index')
            ->withSuccess(__('eligibility created successfully.'));
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
        $eligibility = EligibilityCriteria::find($id);
        if($eligibility){
            return view('eligibility.create', compact('eligibility'));
        }
        return redirect()->route('plans.index')
            ->withError(__('Plan not found.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EligibilityRequest $request,EligibilityCriteria $eligibility)
    {
        $post = $request->only(['name', 'age_less_than', 'age_greater_than', 'last_login_days_ago', 'income_less_than', 'income_greater_than']);
        // dd($request->all());
        $eligibility->update($post);
        return redirect()->route('eligibility.index')
            ->withSuccess(__('Plan updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EligibilityCriteria $eligibility)
    {
        $eligibility->delete();
        return redirect()->route('eligibility.index')
                    ->with('success', 'eligibility deleted successfully.');
    }
}
