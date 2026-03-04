@extends('layouts.base')
@section('title', 'Projects | Prashanth Kumar Kadasi')
@section('content')
<div class="container" style="position:relative;z-index:1;">
    <div class="row"><div class="col-12"><h2>My Projects</h2><p class="mb-4">A collection of web applications, AI tools, dashboards, and educational apps I've built.</p></div></div>
    <div class="row mt-3">
        @foreach($projects as $project)
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <span class="card-title-text">{{ $project['title'] }}</span>
                    @if($project['featured'])<span class="featured-badge">⭐ Featured</span>@endif
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="flex-grow-1">{{ $project['description'] }}</p>
                    <div style="margin-bottom:1rem;">
                        @foreach($project['tags'] as $tag)<span class="project-tag">{{ $tag }}</span>@endforeach
                    </div>
                    <div class="mt-auto">
                        <a href="{{ $project['url'] }}" target="_blank" class="btn btn-{{ $project['color'] }} btn-sm me-2">Visit Site →</a>
                        @if(!empty($project['github']))<a href="{{ $project['github'] }}" target="_blank" class="btn btn-outline-secondary btn-sm">GitHub</a>@endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
