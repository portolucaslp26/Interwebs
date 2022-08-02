<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\URL;
use App\User;
use Illuminate\Support\Facades\Auth;

class URLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $urls = URL::all();
        return view('url.index', compact('urls'));
    }

    // create a new access_url record
    public function store(Request $request)
    {
        $url = new URL;
        $url->url = $request->url;
        $url->http_status_code = $request->http_status_code;
        $url->last_access = $request->last_access;
        $url->user_id = Auth::user()->id;
        $url->save();
        return redirect('/url');
    }

    // get single access_url record
    public static function getAccessUrl($url)
    {
        return URL::where('url', $url)->first();
    }

    // update an existing access_url record
    public static function updateAccessUrl($url, $http_status_code, $user_id)
    {
        $url = URL::where('url', $url)->first();
        $url->http_status_code = $http_status_code;
        $url->user_id = $user_id;
        $url->save();
    }

    // delete an existing access_url record
    public static function destroy($url)
    {
        $url = URL::where('url', $url)->first();
        $url->delete();
    }

}
