<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 *
 */
class DonationController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pages.donation');
    }
}
