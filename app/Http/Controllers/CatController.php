<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Feed;
use App\Cat;

class CatController extends Controller
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
        $catList = Cat::all();
        return view('admin.cat.index')->with('catList', $catList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feed = Feed::lists('url', 'id');
        return view('admin.cat.create')->with('feed', $feed);
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
                'name' => 'required|unique:cats',
            ]);

        $cat = Cat::create($request->all());
        $cat->feed()->attach($request->cat_feed);

        return redirect()->to('/cat')->with('success', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Cat::with('feed')->findorFail($id);
        return view('admin.cat.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Cat::with('feed')->findOrFail($id);
        $feed = Feed::lists('url', 'id');
        return view('admin.cat.edit', compact('cat', 'feed'));
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
                'name' => 'required|unique:cats,name, ' . $id,
            ]);

        $cat = Cat::findOrFail($id);
        $cat->update($request->all());
        if (count($request->cat_feed)) {
            $cat->feed()->sync($request->cat_feed);
        } else {

            $cat->feed()->sync(array());

        }

        return redirect()->to('/cat')->with('success', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cat::find($id)->delete();
        return redirect()->to('/cat')->with('success', 'Category successfully removed');
    }
}
