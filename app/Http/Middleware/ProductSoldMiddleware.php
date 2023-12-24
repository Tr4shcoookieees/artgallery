<?php

namespace App\Http\Middleware;

use App\Models\Artwork;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSoldMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws ProductSoldException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('product_id') && $request->path() == 'order/create') {
            $artwork = Artwork::find($request->product_id);
            if ($artwork->quantity == 0) {
                return redirect()->intended();
            }
        }

        return $next($request);
    }
}
