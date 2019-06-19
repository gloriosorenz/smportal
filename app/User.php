<?php

namespace App;

use App\Role;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'roles_id', 'company', 'no_farmers', 'hectares'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function season_lists()
   {
      return $this->hasMany('App\SeasonList');
   }

   public function barangays()
   {
       return $this->belongsTo(Barangay::class, 'barangays_id');
   }

   public function cities()
   {
       return $this->belongsTo(City::class, 'cities_id');
   }

   public function provinces()
   {
       return $this->belongsTo(Province::class, 'provinces_id');
   }

   public function rice_farmers()
   {
       return $this->hasMany('App\RiceFarmer');
   }
   
   public function products(){
       return $this->hasMany('App\ProductList');
   }





    //  FUNCTIONS


    // Get All Admin
    public static function getAllAdmin(){
        return DB::table('users')->where('roles_id', 1)->get();
    }

    //  Get All Farmers
    public static function getAllFarmers(){
        return DB::table('users')->where('roles_id', 2)->get();
    }

     // Get All Customers
    public static function getAllCustomers(){
        return DB::table('users')->where('roles_id', 3)->get();
    }


}
