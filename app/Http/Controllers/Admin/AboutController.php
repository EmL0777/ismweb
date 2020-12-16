<?php

namespace App\Http\Controllers\Admin;

use App\Entities\About;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateAboutRequest;
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
        $title = trans('admin.abouts.name');

        return view('admin.abouts.index', compact('abouts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.abouts.create');

        return view('admin.abouts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAboutRequest $request
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

        return redirect()->route('Admin.abouts.index')
            ->with('success', trans('admin.global.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        $title = trans('admin.abouts.detail');

        return view('admin.abouts.show',  compact('title','about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $title = trans('admin.abouts.edit');

        return view('admin.abouts.edit', compact('about', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAboutRequest $request
     * @param About $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        $about->update($request->all());

        return redirect()->route('Admin.abouts.index')
            ->with('success', trans('admin.global.success.update'));
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

        return redirect()->route('Admin.abouts.index')
            ->with('success', trans('admin.global.success.delete'));
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
