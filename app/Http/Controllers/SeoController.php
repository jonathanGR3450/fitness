<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class SeoController extends Controller
{
    public function edit(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $seo  = $page->seo ?: new Seo(['page_id' => $page->id, 'robots' => 'index,follow', 'og_type' => 'website', 'twitter_card' => 'summary_large_image', 'sitemap_include' => true, 'sitemap_priority' => 0.8, 'sitemap_changefreq' => 'weekly', 'is_active' => true]);

        return view('admin.seo.edit', compact('page', 'seo'));
    }

    public function update(Request $request, string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        // ❌ Quita cualquier dd() porque corta el flujo.
        // dd($request->all(), $slug, $page);

        $validated = $request->validate([
            'meta_title'           => 'nullable|string|max:150',
            'meta_description'     => 'nullable|string|max:500',
            'meta_keywords'        => 'nullable|string|max:500',
            'canonical_url'        => 'nullable|url|max:500',
            // ✅ Usa Rule::in con los valores completos (con coma)
            'robots'               => ['required', Rule::in([
                'index,follow',
                'noindex,follow',
                'index,nofollow',
                'noindex,nofollow',
            ])],
            'breadcrumb_title'     => 'nullable|string|max:150',

            'og_title'             => 'nullable|string|max:150',
            'og_description'       => 'nullable|string|max:500',
            // ✅ mejor como URL
            'og_image'             => 'nullable|url|max:500',
            'og_type'              => ['required', Rule::in(['website','article','product','business.business'])],
            'og_url'               => 'nullable|url|max:500',
            'og_site_name'         => 'nullable|string|max:100',

            'twitter_card'         => ['required', Rule::in(['summary','summary_large_image','app','player'])],
            'twitter_title'        => 'nullable|string|max:150',
            'twitter_description'  => 'nullable|string|max:500',
            'twitter_image'        => 'nullable|url|max:500',
            'twitter_site'         => 'nullable|string|max:50',
            'twitter_creator'      => 'nullable|string|max:50',

            'focus_keyword'        => 'nullable|string|max:100',
            'sitemap_include'      => 'nullable|boolean',
            'sitemap_priority'     => 'nullable|numeric|min:0.1|max:1.0',
            'sitemap_changefreq'   => ['required', Rule::in(['always','hourly','daily','weekly','monthly','yearly','never'])],
            'is_active'            => 'nullable|boolean',

            'schema_markup'        => 'nullable', // texto JSON (opcional)
        ]);

        // Normaliza switches (checkbox)
        $validated['sitemap_include'] = $request->boolean('sitemap_include');
        $validated['is_active']       = $request->boolean('is_active');

        // (Opcional) si quieres guardar schema como array cuando venga JSON válido:
        if (!empty($validated['schema_markup'])) {
            $decoded = json_decode($validated['schema_markup'], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $validated['schema_markup'] = $decoded; // tu modelo Seo tiene cast a array
            }
        }

        $page->seo()->updateOrCreate(
            ['page_id' => $page->id],
            $validated
        );

        return redirect()
            ->route('admin.seo.edit', $page->slug)
            ->with('success', 'Configuración SEO actualizada correctamente');
    }
}
