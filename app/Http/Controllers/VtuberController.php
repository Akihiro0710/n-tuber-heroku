<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
        $vtubers = Vtuber::select(['id', 'thumbnail', 'name'])->get()->toArray();
        $votes = $this->getVotes($request)
            ->get()
            ->toArray();
        foreach ($vtubers as $i => $vtuber) {
            $vtubers[$i]['gender'] = -1;
            foreach ($votes as $vote) {
                if ($vtuber['id'] == $vote['vtuber_id']) {
                    $vtuber[$i]['gender'] = intval($vote['gender']);
                    break;
                }
            }
        }
        return view('vtubers.index', compact('vtubers'));
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
        $movies = $vtuber->movies()->select(['id', 'youtube_id', 'title'])->get()->toArray();
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
