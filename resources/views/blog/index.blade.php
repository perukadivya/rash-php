@extends('layouts.base')
@section('title', 'Blog | Prashanth Kumar Kadasi')
@section('content')
<div class="container" style="position:relative;z-index:1;">
    <div class="row"><div class="col-12"><h2><i class="fas fa-blog" style="background:var(--accent-gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;"></i> Blog</h2><p class="mb-3">Thoughts on AI, data engineering, and building things that matter.</p></div></div>
    @if(count($categories) > 0)
    <div class="row mb-4"><div class="col-12">
        <div class="blog-filter-bar">
            <button class="blog-filter-pill active" data-category="all" onclick="filterCategory('all',this)"><i class="fas fa-th"></i> All <span class="blog-filter-count">{{ count($posts) }}</span></button>
            @foreach($categories as $cat)<button class="blog-filter-pill" data-category="{{ $cat }}" onclick="filterCategory('{{ $cat }}',this)">{{ $cat }}</button>@endforeach
        </div>
        <div class="blog-showing" id="blog-showing">Showing <strong id="visible-count">{{ count($posts) }}</strong> of {{ count($posts) }} posts</div>
    </div></div>
    @endif
    <div class="row" id="blog-grid">
        @foreach($posts as $post)
        <div class="col-12 col-md-6 col-lg-4 mb-4 blog-card-wrapper" data-category="{{ $post['category'] ?? 'Technology' }}">
            <a href="/blog/{{ $post['slug'] }}" style="text-decoration:none;">
                <div class="card blog-card h-100"><div class="card-body">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.5rem;">
                        <span class="blog-date"><i class="far fa-calendar-alt"></i> {{ $post['date'] }}
                            @if(!empty($post['author']))<span style="display:inline-block;background:var(--accent-gradient);color:white;padding:1px 8px;border-radius:10px;font-size:0.65rem;font-weight:600;margin-left:0.4rem;vertical-align:middle;"><i class="fas fa-robot" style="margin-right:3px;"></i>{{ $post['author'] }}</span>@endif
                        </span>
                        <span class="blog-category-badge">{{ $post['category'] ?? 'Technology' }}</span>
                    </div>
                    <h5 style="margin-top:0.25rem;color:var(--text-primary);">{{ $post['title'] }}</h5>
                    <p>{{ $post['excerpt'] }}</p>
                    <div>@foreach($post['tags'] as $tag)<span class="blog-tag">{{ $tag }}</span>@endforeach</div>
                </div></div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<script>
function filterCategory(c,b){document.querySelectorAll('.blog-filter-pill').forEach(p=>p.classList.remove('active'));b.classList.add('active');
let v=0;document.querySelectorAll('.blog-card-wrapper').forEach(card=>{if(c==='all'||card.dataset.category===c){card.style.display='';card.style.opacity='1';v++;}else{card.style.opacity='0';setTimeout(()=>{card.style.display='none';},250);}});
document.getElementById('visible-count').textContent=v;}
</script>
@endsection
