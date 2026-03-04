@extends('layouts.base')
@section('title', 'Skills | Prashanth Kumar Kadasi')
@section('content')
<div class="container" style="position:relative;z-index:1;">
    <div class="row"><div class="col-12"><h2>Technical Skills</h2><p class="mb-4">A diverse toolkit spanning full-stack development, cloud infrastructure, and AI/ML.</p></div></div>
    <div class="row">
        @php $icons = ['Languages' => '💻', 'Frameworks & Libraries' => '⚡', 'Cloud & DevOps' => '☁️', 'AI & ML' => '🤖']; @endphp
        @foreach($skills as $category => $items)
        <div class="col-12 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">{{ $icons[$category] ?? '📦' }} {{ $category }}</div>
                <div class="card-body">
                    @foreach($items as [$skill, $cat])
                        <span class="skill-badge {{ $cat }}">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
