<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard.index', [
            'recent_products' => Product::where('created_at', '>', Carbon::now()->subDays(7))->where('created_at', '<', Carbon::now())->count(),
            'recent_review' => ProductReview::where('created_at', '>', Carbon::now()->subDays(7))->where('created_at', '<', Carbon::now())->count(),
            'products' => Product::latest()->limit(10)->get(),
        ]);
    }
}
