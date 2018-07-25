<?php

namespace App\Http\Controllers;

use App\Rss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RssController extends Controller
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
        return view('rss.index', ['rsses' => Auth::user()->rss()->paginate(10)]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rss.create', ['rss' => []]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'rss_path' => 'required|string|max:255',

        ]);
        if (!filter_var($request['rss_path'], FILTER_VALIDATE_URL) or (@simplexml_load_file($request['rss_path']) == false)){
            return redirect()->back()->with("error", "Url is incorrect");
    } else {


        Rss::create([
            'name' => $request['name'],
            'rss_path' => $request['rss_path'],
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('rss.index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rss $rss
     * @return \Illuminate\Http\Response
     */
    public function show(Rss $rss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rss $rss
     * @return \Illuminate\Http\Response
     */
    public function edit(Rss $rss)
    {
        return view('rss.edit', [
            'rss' => $rss
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Rss $rss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rss $rss)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rss_path' => 'required|string|max:255',
        ]);
        if (!filter_var($request['rss_path'], FILTER_VALIDATE_URL) or (@simplexml_load_file($request['rss_path']) == false)) {
            return redirect()->back()->with("error", "Url is incorrect");
        } else {
            $rss->name = $request['name'];
            $rss->rss_path = $request['rss_path'];
            $rss->save();

            return redirect()->route('rss.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rss $rss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rss $rss)
    {
        $rss->delete();

        return redirect()->route('rss.index');
    }
}
