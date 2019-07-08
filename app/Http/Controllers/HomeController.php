<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Slider;
use Carbon\Carbon;
use Image;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      return view('home');
    }

// To view all user
    function user()
    {
      $all_users  = User::all();
      return view('user_list', compact('all_users'));
    }

//  To view user profile
    function viewuserprofile()
    {
      $user_profile = Auth::user();
      return view('user/view', compact('user_profile'));
    }

//  To delete all user
    function userdelete($user_id)
    {
      User::findOrFail($user_id)->delete();
      return back()->with('deleted_msg', 'User Deleted Successfully!');
    }

//  To view all slider
    function addslider()
    {
      $all_sliders = Slider::all();
      return view('slider/view', compact('all_sliders'));
    }

//  To delete all slider
    function sliderdelete($slider_id)
    {
      $photo = Slider::findOrFail($slider_id)->slider_photo;
      if ($photo != 'dflt.jpg') {
        $link = base_path('public/uploads/slider_photos/').$photo;
        unlink($link);
      }
      Slider::findOrFail($slider_id)->delete();
      return back()->with('deleted_msg', 'Slider Deleted Successfully!');
    }

//  To insert all slider
    function sliderinsert(Request $request)
    {
      $request->validate([
        'slider_name' => 'required',
        'slider_details' => 'required',
        'button_name' => 'required ',
      ]);
      $slider_id = Slider::insertGetId([
        'slider_name' => $request->slider_name,
        'slider_details' => $request->slider_details,
        'button_name' => $request->button_name,
        'created_at' => Carbon::now(),
      ]);
          if($request->hasFile('slider_photo')){
        $slider_photo = $request->file('slider_photo');
        $filename = time() . '.' . $slider_photo->getClientOriginalExtension();
        Image::make($slider_photo)->resize(394, 451)->save( base_path('public/uploads/slider_photos/' . $filename ),60 );
        Slider::find($slider_id)->update([
          'slider_photo' => $filename,
        ]);
      }
      return back()->with('success_msg', 'Slider Inserted Successfully!');
    }

//  To edit all slider
    function slideredit($id)
    {
      $edit_slider = Slider::findOrFail($id);
      return view('slider/edit', compact('edit_slider'));
    }

//  To update all slider
    function editsliderinsert(Request $request)
    {
      Slider::findOrFail($request->slider_id)->update([
        'slider_name' =>$request->slider_name,
        'slider_details' =>$request->slider_details,
        'slider_details' =>$request->button_name,
      ]);
      if ($request->hasFile('slider_photo')) {
        if (Slider::findOrFail($request->slider_id)->slider_photo != 'dflt.jpg') {
            $link = base_path('public/uploads/slider_photos/').Slider::findOrFail($request->slider_id)->slider_photo;
            unlink($link);
          }
          $slider_photo = $request->file('slider_photo');
          $filename = time() . '.' . $slider_photo->getClientOriginalExtension();
          Image::make($slider_photo)->resize(394, 451)->save( base_path('public/uploads/slider_photos/' . $filename ),60 );
          Slider::find($request->slider_id)->update([
            'slider_photo' => $filename,
          ]);
    }
  }



























}
