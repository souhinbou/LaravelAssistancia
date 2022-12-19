<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth()->user()->role=='admin')
        {

            $demandes=Demande::where('admin_id',Auth::user()->id)->get();
            return  view('admin.list',compact('demandes'));

        }
        else if (Auth()->user()->role=='superadmin'){
            return view('superadmin.super');
        }
        else
            return view('demandes.saisie');
    }
}
