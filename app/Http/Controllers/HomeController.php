<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;
use App\Models\Package;
use App\Models\Reserve;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getsetting()
    {
        return Setting::first();
    }
    public function index(){
        $setting=Setting::first();
        $slider=Package::select('id','title','image','slug','price','category_id')->limit(4)->get();
        $daily=Package::select('id','title','image','slug','price','category_id')->limit(4)->inRandomOrder()->get();
        $last=Package::select('id','title','image','slug','price','category_id')->orderByDesc('id')->get();
        $picked=Package::select('id','title','image','slug','price','category_id')->inRandomOrder()->get();
        $data=[
            'setting'=>$setting,
            'daily'=>$daily,
            'last'=>$last,
            'picked'=>$picked,
            'slider'=>$slider,
            'page'=>'home'

        ];
        return view('home.index',$data);
    }
    public static function categoryList()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }


    public function package($id,$slug){
        $setting=Setting::first();
        $data=Package::find($id);
        $images=Image::where('package_id',$id)->get();
        $reviews=Review::where('package_id',$id)->get();

        return view('home.package_detail',['setting'=>$setting,'data'=>$data,'images'=>$images,'reviews'=>$reviews]);

    }
    public function categorypackages($id,$slug){
        $setting=Setting::first();
        $datalist=Package::where('category_id',$id)->get();
        $data=Category::find($id);

        return view('home.category_packages',['data'=>$data,'datalist'=>$datalist,'setting'=>$setting]);

    }

    public function aboutus(){
        return view('home.about');
    }
    public function contact(){
        $setting=Setting::first();
        return view('home.contact',['setting'=>$setting,'page'=>'home']);
    }

    public function getpackage(Request $request)
    {
        $search=$request->input('search');
        $count=Package::where('title','like','%'.$search.'%')->get()->count();
        if($count==1)
        {
            $data=Package::where('title','like','%'.$search.'%')->first();
            return redirect()->route('package',['id'=>$data->id,'slug'=>$data->slug]);
        }
        else
        {
            return redirect()->route('packagelist',['search'=>$search]);
        }


    }
    public function packagelist($search){
        $datalist=Package::where('title','like','%'.$search.'%')->get();

        return view('home.search_packages',['search'=>$search,'datalist'=>$datalist]);

    }
    public function references(){
        $setting=Setting::first();
        return view('home.references',['setting'=>$setting,'page'=>'home']);
    }


    public function sendmessage(Request $request)
    {
        $data = new Message();

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');


        $data->save();

        return redirect()->route('contact')->with('success','Mesajınız kaydedilmiştir');
    }


    public function sendreview(Request $request,$id)
    {
        $data = new Review;

        $data->user_id = Auth::id();
        $package = Package::find($id);
        $data->package_id=$id;
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->IP = $_SERVER['REMOTE_ADDR'];

        $data->save();

        return redirect()->route('package',['id'=>$package->id,'slug'=>$package->slug])->with('success','Mesajınız kaydedilmiştir');
    }
    public function sendreserve(Request $request,$id)
    {
        $data = new Reserve;

        $data->user_id = Auth::id();
        $package = Package::find($id);
        $data->package_id=$id;
        $data->people = $request->input('people');
        $data->startDate = $request->input('startDate');
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->amount=$data->people*$package->price;
        $data->save();

        return redirect()->route('package',['id'=>$package->id,'slug'=>$package->slug])->with('success','Rezervasyonunuz kaydedilmiştir');
    }
    public function faq(){
        $setting=Setting::first();
        $datalist=Faq::all()->sortBy('position');
        return view('home.faq',['datalist'=>$datalist,'setting'=>$setting]);
    }

    public function login(){
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {
            return view('admin.login');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
