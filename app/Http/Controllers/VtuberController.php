<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Vote;
use App\Models\Vtuber;
use Illuminate\Http\Request;

class VtuberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Vtuber::all()->toArray();
        $vtubers = [];
        $valid = true;

        foreach ($data as $item) {
            $gender = $this->answeredGender($request, $item['id']);
            if ($gender < 0) {
                $valid = false;
            }
            $item['gender'] = $gender;
            $vtubers[] = $item;
        }
        return view('vtubers.index', compact('vtubers', 'valid'));
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
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $vtuber = Vtuber::find($id);
        $movies = Movie::where('vtuber_id', $id)->get()->toArray();
        if ($vtuber == null) {
            abort('404');
        }
        $vtuber = $vtuber->toArray();
        $vtuber['gender'] = $this->answeredGender($request, $id);
        $redirect_to = route('vtubers.show', ['id' => $vtuber['id']]);
        return view('vtubers.show', compact('vtuber', 'movies', 'redirect_to'));
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
