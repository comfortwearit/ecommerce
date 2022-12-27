<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
use App\Models\User;
//use App\User;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address;
        if($request->has('customer_id')){
            $address->user_id   = $request->customer_id;
        }
        else if(Auth::check()){
            $address->user_id   = Auth::user()->id;
        }else{    
            $address->user_id  = $request->session()->get('temp_user_id'); //purchase without login
            $address->session_id  = $request->session()->get('temp_user_id');
        }
        $address->address       = $request->address;
        $address->country_id    = $request->country_id;
        $address->state_id      = $request->state_id;
        $address->city_id       = $request->city_id;
        $address->longitude     = $request->longitude;
        $address->latitude      = $request->latitude;
        $address->postal_code   = $request->postal_code;
        $address->phone         = $request->phone;
        $address->save();
        $user = User::where('phone',$request->phone)->first();
        if(!Auth::check() && $user == null){
            $user = new User;
            $user->name         = $request->name;
            $user->phone         = $request->phone;
            $user->save();
        }
        return back();
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
        $data['address_data'] = Address::findOrFail($id);
        $data['states'] = State::where('status', 1)->where('country_id', $data['address_data']->country_id)->get();
        $data['cities'] = City::where('status', 1)->where('state_id', $data['address_data']->state_id)->get();
        $data['user'] = User::where('phone', $data['address_data']->phone)->first();
        
        $returnHTML = view('frontend.partials.address_edit_modal', $data)->render();
        return response()->json(array('data' => $data, 'html'=>$returnHTML));
//        return ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        //$phone= number_format($request->phone);
        if(!Auth::check() ){
            $userInfo = User::where('phone',$address->phone)->first();
            $userId= $userInfo->id;
            $user = User::findOrFail($userId);
            $user->name         = $request->name;
            $user->phone         = $request->phone;
            $user->save();
        }
        
        $address->address       = $request->address;
        $address->country_id    = $request->country_id;
        $address->state_id      = $request->state_id;
        $address->city_id       = $request->city_id;
        $address->longitude     = $request->longitude;
        $address->latitude      = $request->latitude;
        $address->postal_code   = $request->postal_code;
        $address->phone         = $request->phone;

        $address->save();
       

        flash(translate('Address info updated successfully'))->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        if(!$address->set_default){
            $address->delete();
            return back();
        }
        flash(translate('Default address can not be deleted'))->warning();
        return back();
    }

    public function getStates(Request $request) {
        $states = State::where('status', 1)->where('country_id', $request->country_id)->get();
        $html = '<option value="">'.translate("Select State").'</option>';
        
        foreach ($states as $state) {
            $html .= '<option value="' . $state->id . '">' . $state->name . '</option>';
        }
        
        echo json_encode($html);
    }
    
    public function getCities(Request $request) {
        $cities = City::where('status', 1)->where('state_id', $request->state_id)->get();
        $html = '<option value="">'.translate("Select City").'</option>';
        
        foreach ($cities as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->getTranslation('name') . '</option>';
        }
        
        echo json_encode($html);
    }

    public function set_default($id){
        foreach (Auth::user()->addresses as $key => $address) {
            $address->set_default = 0;
            $address->save();
        }
        $address = Address::findOrFail($id);
        $address->set_default = 1;
        $address->save();

        return back();
    }
}
