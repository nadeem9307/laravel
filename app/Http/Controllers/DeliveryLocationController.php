<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DeliveryLocation;
use App\Http\Requests\DeliveryStoreRequest;

class DeliveryLocationController extends Controller
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
    	$deliverylocation = DeliveryLocation::paginate(12);
        return view('admin.deliverylocation.index',compact('deliverylocation'));
    }
     public function create()
    {
        return view('admin.deliverylocation.create');
    }
    public function store(DeliveryStoreRequest $request,DeliveryLocation $deliverylocation)
    {    	
    	$deliverylocation->zipcode=$request->zipcode ?? '';
    	if($deliverylocation->save()){
            return redirect()->route('deliverylocation.index')->withStatus(__('Delivery Location successfully created.'));
    	} 
    }
    public function edit(DeliveryLocation $deliverylocation)
    {
         return view('admin.deliverylocation.edit',compact('deliverylocation'));
    }

    public function update(DeliveryStoreRequest $request, DeliveryLocation $deliverylocation){
        $deliverylocation->update([
           'zipcode' => $request->zipcode
        ]);
        return redirect()->route('deliverylocation.index')->withStatus(__('Delivery Location successfully updated.'));
    }
    public function destroy(DeliveryLocation $deliverylocation)
    {
        $deliverylocation->delete();

        return redirect()->route('deliverylocation.index')->withStatus(__('Delivery Location successfully deleted.'));
    }

}
