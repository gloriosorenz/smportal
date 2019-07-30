<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\ProductList;
use App\CurrentProductList;
use App\OriginalProductList;
use App\User;
use App\Barangay;
use App\Province;
use App\City;
use App\Role;
use App\Region;
use App\Product;
use App\OrderProduct;
use App\Order;
use App\Season;
use App\SeasonList;

use DB;
use DarkSkyApi;
use Carbon\Carbon;
use Gmopx\LaravelOWM\LaravelOWM;

use Notification;
use App\Notifications\AutoWitherProduct;
use App\Notifications\AutoDamageProduct;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmergroups = User::where('roles_id','=',2)
            ->count();
        $clients = User::where('roles_id','>',2)
            ->count();
        $lagunabarangays = Barangay::where('cities_id','=', 43428)
            ->whereNotIn('id', array(11218, 11219, 11223,11224,11225,11228))
            ->count();

        // dd(Carbon::now());

        // AUTOMATED WITHERING PRODUCTS
            // Get all good from current
            $goodid = CurrentProductList::where('harvest_date', '<', Carbon::now()->subDays(7))
                ->where('products_id','=', 1)
                ->get();

                // dd($pro);

            // get all withered from original
            $witheredid = OriginalProductList::where('harvest_date', '<', Carbon::now()->subDays(7))
                ->where('products_id','=', 2)
                ->get();

            // get all damaged from original
            $damagedid = OriginalProductList::where('harvest_date', '<', Carbon::now()->subDays(7))
                ->where('products_id','=', 3)
                ->get();

            // dd($goodid);

          

            // will update price and product type to withered, the original withered to damaged
                foreach($goodid as $pr){
                    foreach($witheredid as $wh){
                        foreach($damagedid as $dg){
                            if($pr->id+1 == $wh->id){
                                // if(auth()->user()){
                                //     $id = auth()->user()->id;
                                //     $farmer = CurrentProductLIst::where('id', $pr->id)
                                //         ->where('products_id', 1)
                                //         // ->where('users_id', '=', $id)
                                //         ->first();
                                //         ;
                                //     dd($farmer);

                                //     if($farmer){
                                //         dd($farmer);
                                //         // $user = User::findOrFail($farmer->users_id);
                                //         // Notification::send($user, new AutoWitherProduct());
                                //     }
                                // }
                                $pr->update(['products_id' => 2]);
                                $pr->update(['price' => $wh->price] );
                            }
                            if($pr->id+2 == $dg->id){
                                $pr->update(['products_id' => 3]);
                                $pr->update(['price' => 0] );

                                // Notification::send($users, new AutoDamageProduct());
                            }
                        }
                    }
                }
                


        // AUTOMATED DAMAGED PRODUCTS
            //  Get all withered from current
            $witheredid1 = CurrentProductList::where('harvest_date', '<', Carbon::now()->subDays(14))
                ->where('products_id','=', 2)
                ->get();


            // get all damaged from original
            $damagedid = OriginalProductList::where('harvest_date', '<', Carbon::now()->subDays(14))
                ->where('products_id','=', 3)
                ->get();

            // will update price and product type to damaged
                foreach($witheredid1 as $pr){
                    foreach($damagedid as $wh){
                        if($pr->id+1 == $wh->id || $pr->id+2 == $wh->id){
                            $pr->update(['products_id' => 3]);
                            $pr->update(['price' => $wh->price] );
                        }
                    }
                }
        
        // dd($clients);
        $products = Product::where('id', '!=', 3)
        ->where('id','!=',4)
        ->get();

        // $product_lists = Product::where('products_id', '!=', 3) 
        //                 ->where('curr_quantity', '>', 0)
        //                 ->get();
                        
        // $lowm = new LaravelOWM();

        // $forecast = $lowm->getWeatherForecast(array('lat' => 14.2936, 'lon' => 121.1067),null,null,5);
        // $current_weather = $lowm->getCurrentWeather(array('lat' => 14.2936, 'lon' => 121.1067));
        // $current_weather = $lowm->getCurrentWeather(array('lat' => 14.2471, 'lon' => 121.1367));
        // $forecast = $lowm->getWeatherForecast($query, $lang = 'en', $units = 'metric', $days = 5, $cache = false, $time = 600);
        // dd($forecast);

        // // if ($forecast)
        // foreach ($forecast as $f){
        //     // dd($f);

        //     //

        //     // $alert = 'normal';

        //     $wind = $f->wind->speed;
        //     // $wind = $f->wind;
        //     strval($wind);
        //     // dd($wind);

        //     // $was = $f->wind;

        //     // dd($wind);
        //     // if ($wind >= 40 && $wind <= 60){
        //     //     $alert = 'Alert';
        //     //     // dd($alert);
        //     // } else {
        //     //     $alert = 'Safe winds.';
        //     // }

        //     // dd($alert);

        //     // $whut = $f->city->name;
        //     // dd($whut);
        //     // dd($wind);
        // }

        $farmers = DB::table('product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'curr_products_id');

            // $minutes = 60;
            // $forecast = Cache::remember('forecast', $minutes, function () {
            //     Log::info("Not from cache");
            //     $app_id = config("here.app_id");
            //     $app_code = config("here.app_code"); 
            //     $lat = config("here.lat_default");
            //     $lng = config("here.lng_default");
            //     $url = "https://weather.api.here.com/weather/1.0/report.json?product=forecast_hourly&latitude=${lat}&longitude=${lng}&oneobservation=true&language=en&app_id=${app_id}&app_code=${app_code}";
            //     Log::info($url);
            //     $client = new \GuzzleHttp\Client();
            //     $res = $client->get($url);
            //     if ($res->getStatusCode() == 200) {
            //     $j = $res->getBody();
            //     $obj = json_decode($j);
            //     $forecast = $obj->hourlyForecasts->forecastLocation;
            //     }
            //     return $forecast;
            // });

            // dd($forecast);
            // dd($current_weather);
        // return view('welcome', ["forecast" => $forecast]);


        // Auto add Cancel Order with Quantity
        $orderproducts = OrderProduct::where('created_at', '<', Carbon::now()->subDays(3))
            ->where('order_product_statuses_id','=', 1)
            ->get();

            foreach($orderproducts as $op){
                    $op->current_product_lists->update(['quantity' => $op->current_product_lists->quantity + $op->quantity]);
                    $op->update(['order_product_statuses_id' => 4]);    
            }

        // Auto add Cancel Order with Quantity (Confirmed Status)
        // $orderproducts1 = OrderProduct::where('updated_at', '<', Carbon::now()->subDays(3))
        //     ->where('order_product_statuses_id','=', 2)
        //     ->get();

        //     foreach($orderproducts1 as $op){
        //             $op->current_product_lists->update(['quantity' => $op->current_product_lists->quantity + $op->quantity]);
        //             $op->update(['order_product_statuses_id' => 4]);     
        //     }

        // Auto check status of Product Order to change status or Order
        $poee = OrderProduct::groupBy('orders_id')->select( 'orders_id', DB::raw( 'AVG(order_product_statuses_id) as avg' ) )->get();
        // dd($poee);

        foreach($poee as $pee){
            // dd($pee);
            if($pee->avg == 3){
                $pee->orders->update(['order_statuses_id'=>2]); // Done
            } elseif ($pee->avg == 4){
                $pee->orders->update(['order_statuses_id'=>4]); // Cancelled
            } else
                $pee->orders->update(['order_statuses_id'=>1]); // Pending
        }


        // ------------------------------------------------------------------------------------------------------------------------
        // Check customer orders (Auto-Wither Notif)
        // ------------------------------------------------------------------------------------------------------------------------
        
        

        if(auth()->user()){
            $id = auth()->user()->id;
            // Auto withered products
            $good_rice_orders = OrderProduct::join('orders', 'order_products.orders_id', '=', 'orders.id')
                ->join('original_product_lists', 'order_products.original_product_lists_id', '=', 'original_product_lists.id')
                ->where('products_id', '=', 1)
                ->select('order_products.*', 'orders.users_id')
                ->where('orders.users_id', '=', $id)
                // ->pluck('orders.users_id')
                ->get()
                ;

                foreach($good_rice_orders as $order){
                    // Get recipient
                    $id = $order->users_id;
                    $user = User::findOrFail($id);
                    // dd($user);
                    if($order->original_product_lists->harvest_date <= Carbon::now()->subDays(7)){
                        // Notification::send($user, new AutoWitherProduct());
                    }
                }

            // Auto damage products
            $wither_rice_orders = OrderProduct::join('orders', 'order_products.orders_id', '=', 'orders.id')
                ->join('original_product_lists', 'order_products.original_product_lists_id', '=', 'original_product_lists.id')
                ->where('products_id', '=', 2)
                ->select('order_products.*', 'orders.users_id')
                ->where('orders.users_id', '=', $id)
                // ->pluck('orders.users_id')
                ->get()
                ;
                // dd($wither_rice_orders);


                foreach($wither_rice_orders as $order){
                    // Get recipient
                    $id = $order->users_id;
                    $user = User::findOrFail($id);
                    // dd($user);
                    if($order->original_product_lists->harvest_date <= Carbon::now()->subDays(7)){
                        // Notification::send($user, new AutoDamageProduct());
                    }
                }

            
        }
        

        // ------------------------------------------------------------------------------------------------------------------------
        // Check if user is active (auto deactivate user)
        // ------------------------------------------------------------------------------------------------------------------------

        $count_seasons = Season::where('season_statuses_id', '!=', 1)->count();
        $counter = 0;
        $counter2 = 0;
        if(auth()->user()){
            for($i=$count_seasons-3; $i <= $count_seasons; $i++){
                // checks if farmer has been active in the past 3 seasons
                $check_farmer_active = SeasonList::join('seasons', 'season_lists.seasons_id', '=', 'seasons.id')
                    ->where('seasons_id', $i)
                    ->where('users_id', auth()->user()->id)
                    ->count()
                    ;

                $check_customer_active = Order::join('order_products', 'orders.id', '=', 'order_products.orders_id')
                    ->join('original_product_lists', 'order_products.original_product_lists_id', '=', 'original_product_lists.id')
                    // ->select('orders.users_id')
                    // ->where('seasons_id', $i)
                    // ->where('orders.users_id', auth()->user()->id)
                    ->get()
                    ;

                // dd($check_customer_active);

                if($check_farmer_active == 0)
                    $counter ++;

                // if($check_customer_active == 0)
                //     $counter2 ++;
            }

            // dd($counter2);


            if($counter > 3){
                // Deactivates farmer
                if(auth()->user()->roles_id == 2){
                    $id = auth()->user()->id;
                    $user = User::findOrfail($id);
                    $user->active = false;
                    $user->save();
                }
            }
        
            
        }
        






        return view('/website')
                ->with('products', $products)
                ->with('farmers', $farmers)
                ->with('farmergroups', $farmergroups)
                ->with('clients', $clients)
                ->with('lagunabarangays', $lagunabarangays)
                // ->with('forecast',$forecast)
                // ->with('current_weather',$current_weather)
                // ->with('wind',$wind)
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_order($id)
    {
        $order = Order::findOrFail($id);

        // $farmers = OrderProduct::where('orders_id', $order->id)
        //         ->groupBy('farmers_id')
        //         ->get();

        $farmers = OrderProduct::where('orders_id', $order->id)
                // ->selectRaw('farmers.*')
                ->get()
                ->groupBy('farmers_id');


        $data = $farmers->all();

        // dd($farmers);

        return view('/website/view_order')
            ->with('order', $order)
            ->with('farmers', $farmers)
            ->with('data', $data)
            ;
    }

    /**
     * Display all the products of the farmers.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
         // Get latest season
         $latest_season = DB::table('seasons')
         ->where('season_statuses_id', 2)
         ->orderBy('id', 'desc')->first();

        //Show all Products
        // $product_lists = CurrentProductList::where('seasons_id', $latest_season->id)
        // ->where('products_id', '!=', 3) 
        // ->where('quantity', '>', 0)
        // ->get();

        $product_lists = CurrentProductList::where('products_id', '!=', 3) 
                        ->where('quantity', '>', 0)
                        ->get();

        // dd($product_lists);
                        

        $farmers = DB::table('curr_product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'products_id');

        
        // dd($farmers);
        return view('website.shop')
                ->with('product_lists', $product_lists)
                ->with('farmers', $farmers);
        // return view('website.shop');
    }


    public function weather()
    {
        // ------------------------------------------------------------------------------------------------------------------------
        // Weather forecasat
        // ------------------------------------------------------------------------------------------------------------------------

        $current = DarkSkyApi::location(14.2843, 121.0889)
            ->units('ca')
            ->forecast(['currently', 'daily'])
            ;

        // $week = DarkSkyApi::location(14.2843, 121.0889)
        //     ->units('ca')
        //     ->forecast(['daily', 'flags'])
        //     ;
            // dd($current);

        $timemachine = DarkSkyApi::location(14.2843, 121.0889)
            ->units('ca')
            ->timeMachine(Carbon::now()->addDays(4)->format('Y-m-d'), ['currently', 'flags']);
            ;
        // dd($forecast);


        $daily = $current->daily()->data();
        $week = $current->daily();

        // dd($daily);
        $current = $current->currently();
        $three_days = $timemachine->currently();

        // dd($wee);
       
        return view('website.weather')
                ->with('three_days', $three_days)
                ->with('current', $current)
                ->with('daily', $daily)
                ->with('week', $week)
                // ->with('allday', $allday)

                ;
    }


    public function contact()
    {
        // ------------------------------------------------------------------------------------------------------------------------
        // Contact
        // ------------------------------------------------------------------------------------------------------------------------

        // For customers
        // $barangays = Barangay::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $roles = Role::where('id','>',2)->get();


        // For farmers
        $lagunabarangays = Barangay::where('cities_id','=', 43428)->whereNotIn('id', array(11218, 11219, 11223,11224,11225,11228))->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $starosa = City::where('id','=', 433)->get();
        $laguna = Province::where('id','=',19)->get();

        return view('website.contact')
            // ->with('barangays', $barangays)
            ->with('provinces', $provinces)
            ->with('cities', $cities)
            ->with('roles', $roles)
            ->with('lagunabarangays', $lagunabarangays)
            ->with('calabarzon', $calabarzon)
            ->with('laguna',$laguna)
            ->with('starosa',$starosa)
            ;    
        
    }

    public function privacy(){
        
        return view('website.privacy');
    }


}
