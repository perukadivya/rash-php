<?php

namespace App\Http\Controllers;

use App\Data\Projects;
use App\Data\Skills;
use App\Data\Resume;
use App\Data\BlogPosts;

class PageController extends Controller
{
    public function index()
    {
        $projects = Projects::featured();
        return view('index', compact('projects'));
    }

    public function skills()
    {
        $skills = Skills::all();
        return view('skills', compact('skills'));
    }

    public function projects()
    {
        $projects = Projects::all();
        return view('projects', compact('projects'));
    }

    public function resume()
    {
        $experience = Resume::experience();
        $resumeProjects = Resume::projects();
        $resumeSkills = Resume::skills();
        return view('resume', compact('experience', 'resumeProjects', 'resumeSkills'));
    }

    public function blog()
    {
        $posts = BlogPosts::all();
        $categories = collect($posts)->pluck('category')->unique()->sort()->values()->all();
        return view('blog.index', compact('posts', 'categories'));
    }

    public function blogPost($slug)
    {
        $post = BlogPosts::findBySlug($slug);
        if (!$post) {
            abort(404);
        }
        return view('blog.show', compact('post'));
    }

    public function plotter()
    {
        return view('plotter');
    }
}
