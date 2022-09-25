<?php

namespace App\Http\Controllers\frontsite;

use App\Http\Controllers\Controller;

//user library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//use everything
// use Gate;
use Auth;

//Model Here
use App\Models\User;
use App\Models\Operational\Doctor;
use App\Models\Operational\Specialist;


//thirdparty packages

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Middleware
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('pages.frontsite.landing-page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      return abort(404);
    }

    // custom 
}
