<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Vtuber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = DB::table('movies AS m1')
            ->leftjoin('movies AS m2', function ($join) {
                $join->on('m1.vtuber_id', '=', 'm2.vtuber_id');
                $join->on('m1.id', '<', 'm2.id');
            })->whereNull('m2.id')
            ->select('m1.id', 'm1.youtube_id', 'm1.vtuber_id', 'm1.title')
            ->inRandomOrder()
            ->limit(6)
            ->get()
            ->map(function ($item) {
                return (array)$item;
            })
            ->toArray();
        return view('index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
