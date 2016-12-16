<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use SimpleXMLElement;
use App\Feed;
use App\Content;
use App\Cat;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::orderBy('pub_date', 'DESC')->with('feed')->paginate(20);
        $feeds = Feed::with('feed');
        $cats = Cat::all();
        return view('home', compact('content', 'feeds', 'cats'));
    }

    public function group($id)
    {

        $group = Cat::find($id)->feed()->pluck('id');
        $content = Content::whereIn('feed_id', $group)->orderBy('pub_date', 'DESC')->paginate(20);
        $cats = Cat::all();
        return view('home', compact('content', 'feeds', 'cats', 'id'));

    }

}
