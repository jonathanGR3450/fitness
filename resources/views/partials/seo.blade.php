@php
    // Requiere $slug (de la página) o $page
    $slug = $slug ?? ($page->slug ?? null);
    $pageModel = $slug ? \App\Models\Page::where('slug',$slug)->with('seo')->first() : null;
    $seo = $pageModel?->seo;

    $val = fn($k,$def=null)=> $seo?->{$k} ?: $def;
    $title = $val('meta_title', $pageModel->title ?? config('app.name'));
    $desc  = $val('meta_description');
    $canon = $val('canonical_url', url()->current());
@endphp

@if($title)<title>{{ $title }}</title>@endif
@if($desc)<meta name="description" content="{{ $desc }}">@endif
@if($seo && $seo->meta_keywords)<meta name="keywords" content="{{ $seo->meta_keywords }}">@endif
@if($seo && $seo->robots)<meta name="robots" content="{{ $seo->robots }}">@endif
<link rel="canonical" href="{{ $canon }}">

{{-- Open Graph --}}
<meta property="og:type" content="{{ $val('og_type','website') }}">
<meta property="og:title" content="{{ $val('og_title',$title) }}">
<meta property="og:description" content="{{ $val('og_description',$desc) }}">
<meta property="og:url" content="{{ $val('og_url',$canon) }}">
@if($val('og_image'))<meta property="og:image" content="{{ asset($val('og_image')) }}">@endif
@if($val('og_site_name'))<meta property="og:site_name" content="{{ $val('og_site_name') }}">@endif

{{-- Twitter --}}
<meta name="twitter:card" content="{{ $val('twitter_card','summary_large_image') }}">
@if($val('twitter_site'))<meta name="twitter:site" content="{{ $val('twitter_site') }}">@endif
@if($val('twitter_creator'))<meta name="twitter:creator" content="{{ $val('twitter_creator') }}">@endif
@if($val('twitter_title',$title))<meta name="twitter:title" content="{{ $val('twitter_title',$title) }}">@endif
@if($val('twitter_description',$desc))<meta name="twitter:description" content="{{ $val('twitter_description',$desc) }}">@endif
@if($val('twitter_image'))<meta name="twitter:image" content="{{ asset($val('twitter_image')) }}">@endif

{{-- Schema.org JSON-LD --}}
@if($seo && $seo->schema_markup)
<script type="application/ld+json">
{!! is_array($seo->schema_markup) ? json_encode($seo->schema_markup, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) : $seo->schema_markup !!}
</script>
@endif
