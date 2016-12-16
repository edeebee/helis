<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Feed;
use App\Content;

class FeedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedList = Feed::all();
        return view('admin.feed.index')->with('feedList', $feedList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'url' => 'required|url|unique:feeds',
            ]);

        $new_feed = Feed::create($request->all());

        return redirect()->to('/feed')->with('success', 'Feed successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feed = Feed::findorFail($id);
        return view('admin.feed.show', compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feed = Feed::findOrFail($id);
        return view('admin.feed.edit', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'url' => 'required|url|unique:feeds,url, ' . $id,
            ]);
        $feed = Feed::findOrFail($id);
        $feed->update($request->all());
        return redirect()->to('/feed')->with('success', 'Feed successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feed::find($id)->delete();
        Content::where('feed_id','=',$id)->delete();
        return redirect()->to('/feed')->with('success', 'Feed successfully removed');
    }
}
