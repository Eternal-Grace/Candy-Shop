<?php

namespace App\Http\Controllers\Store;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

/**
 *
 */
class ProductsController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function list(): Renderable
    {
        $params = $this->request->only(['page', 'search', 'perPage']);

        $page = (int) ($params['page'] ?? 1);
        $search = $params['search'] ?? '';
        $perPage = (int) ($params['perPage'] ?? 12);

        if (Cache::has('perPage') && ! $this->request->has('perPage')) {
            $perPage = Cache::get('perPage');
        }

        if (Cache::has('search') && Cache::get('search') != $search) {
            $page = 1;
        }

        if ($this->request->has('perPage')) {
            $perPage = $this->request->get('perPage');
            Cache::put('perPage', $perPage, now()->addHours(2));
        }

        // Published Scope ONLY
        // ALSO SEE 'RouteServiceProvider' for explicit Model Binding
        $ddb = new Product();
        $ddb = $ddb->published();

        if (isset($search) && !empty($search)) {
            $search = strip_tags(preg_replace('/\s+/', ' ', trim($search)));
            $ddb = $ddb->where('name', 'LIKE', '%'.$search.'%');
        }
        Cache::put('search', $search ?? '', now()->addHours(2));

        $products = new ProductResourceCollection(
            $ddb
                ->paginate($perPage, '*', 'page', $page)
                // Appends query
                // example: www.abc.com?search=AZ&perPage=69
                ->appends([
                    'perPage' => $perPage,
                    'search' => $search,
                ])
        );

        return view('pages.store', compact('perPage', 'search', 'products', 'page'));
    }

    /**
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        // Explicit binding at 'RouteServiceProvider.php'
        // Returns 404 code, if product.published = false
        // Else Get JSON Resource
        return view('pages.product', compact('product'));
    }
}
