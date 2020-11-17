<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\News;

class NewsController extends Controller
{
    /**
     * @var string
     */
    protected  $title = 'News';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsList = News::orderBy('created_at', 'desc')->paginate(10);
        $title = $this->title;

        return view('admin.news.index', compact('newsList', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create')->with('title', $this->title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        if (! $request->has('display')) {
            $request->merge(['display' => "0"]);
        }
        if (! $request->has('pinned')) {
            $request->merge(['pinned' => "0"]);
        }

        $news = News::create($request->all());
        $news->News_i18ns()->createMany([
            [
                'title' => $request->get('name'),
                'languages' => 'en',
            ],
            [
                'title' => $request->get('name'),
                'languages' => 'ja',
            ],
            [
                'title' => $request->get('name'),
                'languages' => 'zh-TW',
            ],
            [
                'title' => $request->get('name'),
                'languages' => 'zh-CN',
            ],
        ]);

        return redirect()->route('news.index')
            ->with('success', 'Create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = news::find($id);

        $title = 'Info';

        return view('admin.news.show', compact('news', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = news::find($id);

        $title = 'Edit';

        return view('admin.news.edit', compact('news', 'title'));
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
        $news = News::findOrFail($id);
        $request->validate([
           'name' => 'required|max:255',
       ]);
        if (! $request->has('display')) {
            $request->merge(['display' => "0"]);
        }
        if (! $request->has('pinned')) {
            $request->merge(['pinned' => "0"]);
        }

        $news->update($request->all());

        return redirect()->route('news.index')
            ->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('news.index')
            ->with('success', " Deleted successfully.");
    }
}
