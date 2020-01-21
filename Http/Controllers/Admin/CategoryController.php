<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Requests\CategoryRequest;
use Modules\Blog\Entities\Category;
use Modules\Blog\Services\CategoryService;

class CategoryController extends Controller
{

    protected $service;

    public function __construct(CategoryService $service)
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
        return view('blog::admin.category.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog::admin.category.create',[
            'model' => new Category()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        $data = [];
        $data['url'] = route('blog.admin.category.index');
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
        $model = Category::whereId($id)->first();
        return view('blog::admin.category.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $model = Category::whereId($id)->first();
        return view('blog::admin.category.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $model = Category::whereId($id)->first();
        $model->update($request->except([
            '_token'
        ]));
        $data = [];
        $data['url'] = route('blog.admin.category.index');
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
        Category::whereId($id)->first()->delete();
        return redirect()->back();
        //
    }
}
