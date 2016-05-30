<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

class SearchController extends Controller
{
    // Show the main search page
    public function index()
    {
        return View('search.index'); // Displays the search form view
    }

    // Show when the query is running
    public function show($query)
    {

        $resultJob = DB::table('jobs')->where('name', '%'.$query.'%')->where('description', '%'.$query.'%'); // Filter jobs by query
        $resultOffer = DB::table('offers')->where('name', '%'.$query.'%')->where('description', '%'.$query.'%'); // Filter offers by query
        return View('search.view')->with('resultJob', $resultJob)->with('resultOffer', $resultOffer); // Display the show search result view
    }
}
