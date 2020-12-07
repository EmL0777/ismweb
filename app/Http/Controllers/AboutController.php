<?php

namespace App\Http\Controllers;

use App\Entities\About;
use App\Http\Requests\StoreAboutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBy('position', 'ASC')->get();
        $title = 'Abouts List';

        return view('admin.abouts.index', compact('abouts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abouts.create')->with('title', 'New About');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        $about = About::create($request->all());
        $about->Abouts_i18ns()->createMany([
            [
                'title' => $request->get('intro'),
                'languages' => 'en'
            ],
            [
                'title' => $request->get('intro'),
                'languages' => 'ja'
            ],
            [
                'title' => $request->get('intro'),
                'languages' => 'zh-TW'
            ],
            [
                'title' => $request->get('intro'),
                'languages' => 'zh-CN'
            ]
        ]);

        return redirect()->route('abouts.index')
            ->with('success', 'Create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $title = 'Edit About';
        return view('admin.abouts.edit', compact('about', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $about = About::findOrFail($id);
        $request->validate([
            'intro' => 'required|max:255',
            'event_year' => 'required'
        ]);

        $about->update($request->all());

        return redirect()->route('abouts.index')
            ->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('abouts.index')
            ->with('success', " Deleted successfully.");
    }

    /**
     * Reorder the position by AJAX.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer',
           ]);

        foreach ($request->ids as $index => $id) {
            DB::table('abouts')
                ->where('id', $id)
                ->update([
                    'position' => $index + 1
                     ]);
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
