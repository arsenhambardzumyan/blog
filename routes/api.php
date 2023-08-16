<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;


Route::get('/blogs-by-category/{id}', [SiteController::class, 'getBlogsByCategory']);
Route::get('/blogs/{page}', [SiteController::class, 'getBlogs']);
Route::get('/blog/{slug}', [SiteController::class, 'getBlogBySlug']);
Route::get('/categories', [SiteController::class, 'getCategories']);
