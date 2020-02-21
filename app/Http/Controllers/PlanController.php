<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Plan;
use App\Http\Requests\PlanRequest;
use Image;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$plans = Plan::paginate(12);
        return view('admin.plans.index',compact('plans'));
    }
     public function create()
    {
        return view('admin.plans.create');
    }
    public function store(PlanRequest $request,Plan $plan)
    {    	
    	$plan->plan_name=$request->plan_name ?? '';
    	$plan->plan_description=$request->plan_description ?? '';
    	$plan->plan_meal_limit=$request->plan_meal_limit ?? '';
    	$plan->plan_meal_type=$request->plan_meal_type ?? '';
    	$plan->plan_per_meal_price=$request->plan_per_meal_price ?? '';
    	$plan->plan_price=$request->plan_price ?? ' ';
    	if($plan->save()){
            return redirect()->route('plans.index')->withStatus(__('Plan successfully created.'));
    	} 
    }
    public function edit(Plan $plan)
    {
         return view('admin.plans.edit',compact('plan'));
    }

    public function update(PlanRequest $request, Plan $plan){
        $plan->update([
           'plan_name' => $request->plan_name,
           'plan_description' => $request->plan_description,
           'plan_meal_limit' => $request->plan_meal_limit,
           'plan_meal_type' => $request->plan_meal_type,
           'plan_per_meal_price' => $request->plan_per_meal_price,
           'plan_price' => $request->plan_price
        ]);
        return redirect()->route('plans.index')->withStatus(__('Plan successfully updated.'));
    }
    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('plans.index')->withStatus(__('Plan successfully deleted.'));
    }

}
