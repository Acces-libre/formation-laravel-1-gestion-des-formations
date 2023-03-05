<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationFormRequest;
use App\Models\Formation;
use App\Models\Participant;
use App\Models\Technology;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::with('technology')->get();

        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();

        return view('formations.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationFormRequest $request)
    {
        Formation::create([
            'title' => $request->title,
            'desciption' => $request->description,
            'technology_id' => $request->technology_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);

        return back()->with('success', 'Formation cree avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        $participants = Participant::all();

        return view('formations.show', compact('formation', 'participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        $technologies = Technology::all();

        return view('formations.edit', compact('formation', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(FormationFormRequest $request, Formation $formation)
    {
        $formation->update([
            'title' => $request->title,
            'desciption' => $request->description,
            'technology_id' => $request->technology_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);

        return back()->with('success', 'Formation mit a jou avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
