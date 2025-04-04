<?php

namespace App\Http\Controllers\Lessor;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Category/Index', []);
    }
}
