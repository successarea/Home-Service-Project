<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\AddBooking;
use App\Models\ConfirmBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ServiceController extends Controller
{
    //
    public function index(){
        $services = Service::all();
        return view('services',['services'=>$services]);
    }

    public function addNewService() {
        if(Auth::check()) {
            if(Auth::user()->role == "admin") {
                $services = Service::all();
                return view('add_new_service', ['services'=>$services]);
            }
            return back();
        }
        return back();
    }

    public function createService(Request $request) {

        $request->validate([
            'name'=>"required",
            'gallery'=>"required",
            'price'=>"required",
            'duration'=>"required",
            'service_id'=>"required",
        ]);


        $ser_cat = new ServiceCategory;
        $ser_cat->name = $request->name;
        $ser_cat->gallery = $request->gallery;
        $ser_cat->price = $request->price;
        $ser_cat->Duration = $request->duration;
        $ser_cat->service_id = $request->service_id;
        $ser_cat->save();
        return redirect('/');
    }

    public function showServiceDetail($id) {
        if(Auth::check()) {
            $serviceId = Service::find($id)->id;
            $service_details = ServiceCategory::where('service_id', $serviceId)->get();
            return view('service_details', ['service_details'=>$service_details]);
        }
        return redirect('/login')->withErrors(['Auth-alert'=>'Login First To Get More Details']);
        
    }

    public function search(Request $request) {
       

        if(Auth::check()) {
            $data = ServiceCategory::where('name','like','%'.$request->input('query').'%')->get();
            return view('search', ['search_services'=>$data]);
        }
        return redirect('/login')->withErrors(['Auth-alert'=>'Login First To Get More Details']);
        
    }

    public function addBooking(Request $request) {
        $add_booking = new AddBooking;
         $add_booking->user_id = Auth::user()->id;
         $add_booking->service_id = $request->service_id;
         $add_booking->save();
         return redirect('/');
    }

    public static function bookCount() {
        $userId = Auth::user()->id;
       return AddBooking::where('user_id',$userId)->count();
        
    }

    public function bookList() {
        $userId = Auth::user()->id;
        $services = DB::table('add_bookings')
        ->join('service_categories', 'add_bookings.service_id', "=", 'service_categories.id')
        ->where('add_bookings.user_id',  $userId)
        ->select('service_categories.*', 'add_bookings.id as booking_id', )
        ->get();
       
        return view('bookingLists', ['services'=>$services]);
    }

    public function confirmBooking(Request $request ,$id) {
        
        return view('confirmBooking',['booking_id'=>$id]);
    }

    public function confirmInfo(Request $request) {
        $request->validate([
            'name'=>"required",
            'payment'=>"required",
            'phone'=>"required",
            'address'=>"required",
        ]);
        

        $bookingListId = $request->booking_id;
        $bookingList = AddBooking::where('id', $bookingListId)->first();
        
        $confirmation = new ConfirmBooking;
        $confirmation->service_id = $bookingList->service_id;
        $confirmation->user_id = $bookingList->user_id;
        $confirmation->confirm_id = $bookingListId;
        $confirmation->client_name = $request->name;
        $confirmation->payment_method = $request->payment;
        $confirmation->phone = $request->phone;
        $confirmation->address = $request->address;
        $confirmation->save();
        AddBooking::where('id',$bookingListId)->delete(); 
        // return redirect('/paymentReceipt',['bookingItemId'=>$bookingListId]);


        $receipts = DB::table('comfirm_bookings')
        
        ->join('service_categories', 'comfirm_bookings.service_id', "=", 'service_categories.id')
        ->where('comfirm_bookings.confirm_id',  $bookingListId)
        ->get();
        
        return view('paymentReceipt', ['receipts'=>$receipts]);
    }
    
    public function cancelBookingList($id) {
        AddBooking::where('id',$id)->delete();
        return redirect('/bookList');
    }
    
    public function serviceDelete($id) {
        if(Auth::check()) {
            if(Auth::user()->role == 'admin') {
                ServiceCategory::where('id',$id)->delete();
                return back();
            }
            return back();
        }
        return redirect('/login');
    }

    public function serviceEdit($id) {
        if(Auth::user()->role == "admin") {
            $data = ServiceCategory::find($id);
            $services = Service::all();
            return view('/serviceEdit', ['data'=>$data, 'services'=>$services]);
        }
       return back();
    }

    public function serviceUpdate(Request $request,$id) {
        $request->validate([
            'name'=>"required",
            'gallery'=>"required",
            'price'=>"required",
            'duration'=>"required",
            'service_id'=>"required",
        ]);

        $data = ServiceCategory::find($id);
        $data->name = $request->name;
        $data->gallery = $request->gallery;
        $data->price = $request->price;
        $data->Duration = $request->duration;
        $data->service_id = $request->service_id;
        $data->update();
        return redirect('/');
    }
}
