<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResourceCollection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 *
 */
class ShowcaseController extends Controller
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function validator(array $params): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($params, [
            'page' => ['bail', 'integer'],
            'perPage' => ['bail', 'integer']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $params = $this->request->only(['page', 'perPage']);
        $validator = $this->validator($params);

        if (!$validator->fails()) {
            $page = (int) ($params['page'] ?? 1);
            $itemsPerPage = (int) ($params['perPage'] ?? 24);

            if (Cache::has('perPage') && $this->request->missing('perPage')) {
                $itemsPerPage = Cache::get('perPage');
            }
            if ($this->request->has('perPage')) {
                $itemsPerPage = $this->request->get('perPage');
                Cache::put('perPage', $itemsPerPage, now()->addHours(2));
            }

            $data = Product::where('published', '=', false)
                ->where('active', '=', false)
            ;

            $products = new ProductResourceCollection(
                $data->paginate($itemsPerPage, '*', 'stack', $page)
            );

            return view('pages.showcase', [
                'perPage' => $itemsPerPage,
                'productsData' => json_decode($products->toJson(), true),
            ]);
        }
        return $validator->error();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(string $slug)
    {
        return view('pages.product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}
