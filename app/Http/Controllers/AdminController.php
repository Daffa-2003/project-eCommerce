<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     // ADMIN
     public function index()
     {
         return view('admin.pages.dashboard ',[
             'title' => 'Admin Dashboard',
         ]);
     }
     public function report()
     {
         return view('admin.pages.report ',[
             'title' => 'Admin Report',
         ]);
     }
}
