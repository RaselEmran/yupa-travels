<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Hotel;
use App\News;
use App\Packege;
use App\Pages;
use App\TeamMember;
use Cookie;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	//     $this->middleware('auth');
	// }

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Request $request) {
		$sign_up = $request->sign_up;
		if ($sign_up && $sign_up == 'guest') {
			Cookie::queue('guest', 'Tariq', 0);
			return redirect()->route('home.index');
		}
		$data['packege'] = Packege::latest()->take(4)->get();
		$data['destination'] = Destination::latest()->take(4)->get();
		$data['hotel'] = Hotel::latest()->take(4)->get();
		$data['member'] = TeamMember::take(6)->latest()->get();
		return view('fontend.main', compact('data'));
	}

	public function sign_up(Request $request) {
		$sign_up = $request->sign_up;
		if ($sign_up AND $sign_up == 'traveller') {
			return view('fontend.sign_up');
		}
		$cookie = Cookie::get('guest');
		if ($cookie or auth()->user()) {
			return view('fontend.sign_up');
		}
		return view('fontend.sign_up_option');

	}

	public function login() {
		return view('fontend.login');
	}

	public function news() {
		$news = News::paginate(5);
		return view('fontend.news', compact('news'));
	}

	public function news_details($slug, $id) {
		$details = News::find($id);
		return view('fontend.news_details', compact('details'));
	}

	public function about_us() {
		$about = Pages::where('key', 'about')->select('key', 'value')->first();
		$aboutinfo = null;
		if ($about) {
			$aboutinfo = json_decode($about->value);
			return view('fontend.about_us', compact('aboutinfo'));
		} else {
			return redirect('/');
		}
	}

	public function destination_show($id) {
		$destination = Destination::where('id', $id)->firstOrFail();
		return view('fontend.destination_single', compact('destination'));
	}

	public function destination_list() {
		$data['destination'] = Destination::paginate(8);
		return view('fontend.destinations', compact('data'));
	}

}
