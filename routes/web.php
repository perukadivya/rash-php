<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AiInsightController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/skills', [PageController::class, 'skills'])->name('skills');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogPost'])->name('blog.show');
Route::get('/plotter', [PageController::class, 'plotter'])->name('plotter');
Route::post('/api/ai-insight', [AiInsightController::class, 'generate']);
