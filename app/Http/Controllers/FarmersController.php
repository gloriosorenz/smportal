<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class FarmersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmers = User::getAllFarmers();

        return view('admin.farmers.index')
            ->with('farmers', $farmers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.farmers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        $password = substr($random, 0, 6);

        // Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'unique:users,email,$this->id,id',
            'phone' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            // 'barangay' => 'required',
            // 'city' => 'required',
            // 'province' => 'required',
            'company' => 'required|string|max:255',
        ]);

        $farmer = new User;
        $farmer->first_name = $request->input('first_name');
        $farmer->last_name = $request->input('last_name');
        $farmer->email = $request->input('email');
        $farmer->phone = $request->input('phone');
        $farmer->street = $request->input('street');

        // $farmer->barangays_id = $request->input('barangay');
        // $farmer->cities_id = $request->input('city');
        // $farmer->provinces_id = $request->input('province');


        $farmer->company = $request->input('company');
        $farmer->no_farmers = $request->input('no_farmers');
        $farmer->hectares = $request->input('hectares');
        $farmer->password = Hash::make($password);
        $farmer->roles_id = 2;
        $farmer->save();


        return redirect()->route('farmers.index')->with('success','Farmer Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farmer = User::findOrFail($id);

        return view('admin.farmers.show')
            ->with('farmer', $farmer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farmer = User::findOrFail($id);

        return view('admin.farmers.edit')
            ->with('farmer', $farmer);
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

        $farmer = User::find($id);
        $farmer->first_name = $request->input('first_name');
        $farmer->last_name = $request->input('last_name');
        $farmer->email = $request->input('email');
        $farmer->phone = $request->input('phone');
        $farmer->street = $request->input('street');

        // $farmer->barangays_id = $request->input('barangay');
        // $farmer->cities_id = $request->input('city');
        // $farmer->provinces_id = $request->input('province');

        $farmer->company = $request->input('company');
        $farmer->no_farmers = $request->input('no_farmers');
        $farmer->hectares = $request->input('hectares');
        $farmer->save();

        // dd($farmer);

        return redirect('farmers')->with('success','Farmer Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
