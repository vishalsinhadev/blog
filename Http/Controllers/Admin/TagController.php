<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Requests\TagRequest;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Services\TagService;

class TagController extends Controller
{

    protected $service;

    public function __construct(TagService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = $this->service->list();
        return view('blog::admin.tag.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog::admin.tag.create',[
            'model' => new Tag()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());
        $data = [];
        $data['url'] = route('blog.admin.tag.index');
        return response()->json($data);
        //
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $model = Tag::whereId($id)->first();
        return view('blog::admin.tag.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $model = Tag::whereId($id)->first();
        return view('blog::admin.tag.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(TagRequest $request, $id)
    {
        $model = Tag::whereId($id)->first();
        $model->update($request->except([
            '_token'
        ]));
        $data = [];
        $data['url'] = route('blog.admin.tag.index');
        return response()->json($data);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::whereId($id)->first()->delete();
        return redirect()->back();
        //
    }
}
