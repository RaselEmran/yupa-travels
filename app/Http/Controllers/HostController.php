<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Host;
use App\Hotel;
use App\Amenity;
use App\AmenityHotel;
use Validator;
use Auth;

class HostController extends Controller
{
  public function __construct() {
		$this->middleware('auth');	

	}

   public function index()
   {
   	$auth =auth()->user()->id;
   	$info = User::find($auth);
   	return view('fontend.profile.host',compact('info',$info));
   }

   public function store(Request $request)
   {
   	if ($request->ajax()) {
   			$auth =auth()->user()->id;
			$validator = Validator::make($request->all(), [
				'name' => 'required|string',
				'identity' => 'required|string',
				'address' => 'required|string',
				'email' => 'required|email|unique:hosts',
				'phone' => 'required|string',
				'file' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',

			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}

			$check =Host::where('user_id',$auth)->first();
			if ($check) {
				return response()->json(['success' => true, 'status' => 'danger', 'message'=>'You Already Apply.Your application is under Review']);
			}
			else
			{
				$host =new Host;
				$host->user_id =$auth;
				$host->name =$request->name;
				$host->identity =$request->identity;
				$host->address =$request->address;
				$host->email =$request->email;
				$host->phone =$request->phone;
				$host->status ='pending';
				if ($request->hasFile('file')) {
				$storagepath = $request->file('file')->store('public/host/file');
				$fileName = basename($storagepath);
				$host->file = $fileName;
			}
			 $host->save();
			 return response()->json(['success' => true, 'status' => 'success', 'message' => 'Your Application Submitted Wait for next five Working Days will be approve.', 'goto' => route('host')]);
			}
		}
   }

   public function hotel_create()
   {
   	$this->checkhost();
   	$amenities = Amenity::where('status', 1)->get();
   	return view('fontend.profile.add_hotel',compact('amenities'));
   }

   public function hotel_store(Request $request)
   {
   	if ($request->ajax()) {
   		$this->checkhost();
   		$auth =auth()->user()->id;
			$validator = Validator::make($request->all(), [
				'name' => 'required|string|max: 190',
				'entire_place' => 'required|string|max: 190',
				'price' => 'required|numeric',
				'amenity.*' => 'required|integer',
				'photo' => 'required|mimes:jpeg,bmp,png|max:2000',
				'banner' => 'required|mimes:jpeg,bmp,png|max:2000',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$hotel = new Hotel;
			if ($request->hasFile('photo')) {
				$storagepath = $request->file('photo')->store('public/hotel/photo');
				$fileName = basename($storagepath);
				$hotel->photo = $fileName;
			}

			if ($request->hasFile('banner')) {
				$storagepath = $request->file('banner')->store('public/hotel/banner');
				$fileName = basename($storagepath);
				$hotel->banner = $fileName;
			}
			$hotel->name = $request->name;
			$hotel->user_id = $auth;
			$hotel->entire_place = $request->entire_place;
			$hotel->price = $request->price;
			$hotel->status = false;
			$hotel->room_details = $request->room_details;
			$hotel->allow = $request->allow;
			$hotel->policy = $request->policy;
			$hotel->map = $request->map;
			$hotel->meta_title = $request->meta_title;
			$hotel->meta_keywords = $request->meta_keywords;
			$hotel->meta_description = $request->meta_description;
			$hotel->save();
			$hotel_id = $hotel->id;
			if ($request->amenity) {
				foreach ($request->amenity as $amenity) {
					$amenity_hotels = new AmenityHotel;
					$amenity_hotels->amenity_id = $amenity;
					$amenity_hotels->hotel_id = $hotel_id;
					$amenity_hotels->save();
				}
			}

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Hotel Information Add Successfully.', 'goto' => route('add-hotel')]);
		}
   }

   public function hotel_list()
   {
   	$this->checkhost();
   	$auth =auth()->user()->id;
   	$hotel =Hotel::where('user_id',$auth)->paginate(8);
   	return view('fontend.profile.hotel_list',compact('hotel'));
   }

   public function hotel_edit($id)
   {
   	$this->checkhost();
   	$amenities = Amenity::where('status', 1)->get();
   	$auth =auth()->user()->id;
   	$hotel =Hotel::where('id',$id)->where('user_id',$auth)->first();
   	return view('fontend.profile.edit_hotel',compact('hotel','amenities'));
   }

   public function hotel_update(Request $request)
   {
   			if ($request->ajax()) {
   				$this->checkhost();
			$validator = Validator::make($request->all(), [
				'name' => 'required|string|max: 190',
				'entire_place' => 'required|string|max: 190',
				'price' => 'required|numeric',
				'amenity.*' => 'required|integer',
				'photo' => 'sometimes|nullable|mimes:jpeg,bmp,png|max:2000',
				'banner' => 'sometimes|nullable|mimes:jpeg,bmp,png|max:2000',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$hotel = Hotel::find($request->id);
			if ($request->hasFile('photo')) {
				$storagepath = $request->file('photo')->store('public/hotel/photo');
				$fileName = basename($storagepath);
				unlink('storage/hotel/photo/' . $hotel->photo);
				$hotel->photo = $fileName;
			}

			if ($request->hasFile('banner')) {
				$storagepath = $request->file('banner')->store('public/hotel/banner');
				$fileName = basename($storagepath);
				unlink('storage/hotel/banner/' . $hotel->banner);
				$hotel->banner = $fileName;
			}
			$hotel->name = $request->name;
			$hotel->entire_place = $request->entire_place;
			$hotel->price = $request->price;
			$hotel->room_details = $request->room_details;
			$hotel->allow = $request->allow;
			$hotel->policy = $request->policy;
			$hotel->map = $request->map;
			$hotel->meta_title = $request->meta_title;
			$hotel->meta_keywords = $request->meta_keywords;
			$hotel->meta_description = $request->meta_description;
			$hotel->save();
			$hotel_id = $hotel->id;
			$amenity_hotels = AmenityHotel::where('hotel_id', $hotel_id)->delete();
			foreach ($request->amenity as $amenity) {
				$amenity_hotels = new AmenityHotel;
				$amenity_hotels->amenity_id = $amenity;
				$amenity_hotels->hotel_id = $hotel_id;
				$amenity_hotels->save();
			}

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Hotel Information Update Successfully.', 'goto' => route('hotel-list')]);

		}
   }

   protected function checkhost()
   {
	$auth =Auth::user()->id;
	$check =Host::where('user_id',$auth)->firstOrfail();
   }
}
