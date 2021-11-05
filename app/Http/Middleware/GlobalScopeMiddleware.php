<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GlobalScopeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Product::addGlobalScope('published', function (Builder $builder) {
            // Display ONLY active products.
            $builder->where('published', '=', true);
        });
        return $next($request);
    }
}
