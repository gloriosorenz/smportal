<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RequestForm;

class RequestFormsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestForm::all();
        // dd($requests);

        return view('admin.request_forms.index')
            ->with('requests', $requests);
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
        // $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        // $password = substr($random, 0, 6);

        // Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'unique:users,email,$this->id,id',
            'phone' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'company' => 'required|string|max:255',
            // 'active' => true,
        ]);

        $user = new RequestForm;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->street = $request->input('street');

        $user->barangays_id = $request->input('barangay');
        $user->cities_id = $request->input('city');
        $user->provinces_id = $request->input('province');


        $user->company = $request->input('company');
        // $user->password = Hash::make($password);
        // $user->active = true;
        $user->roles_id = $request->input('roles_id');
        $user->save();


        // // Notification
        // $users = User::where('roles_id', 1)
        // ->orWhere('roles_id', 2)
        // ->get();
        // Notification::send($users, new NewCustomerCreated($user));


        return redirect()->route('website.contact')->with('success','Request Sent');
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
        //
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
        //
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
