<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $categories = [
        'Marché' => 'bg-brand-blue',
        'Conseil' => 'bg-green-500',
        'Juridique' => 'bg-purple-600',
        'Réseau' => 'bg-brand-accent',
        'Fiscalité' => 'bg-amber-500',
        'Autre' => 'bg-gray-500',
    ];

    public function index(Request $request)
    {
        $query = Article::orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $articles = $query->paginate(15)->withQueryString();
        $categories = $this->categories;

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:155',
            'keywords' => 'nullable|string|max:500',
            'author' => 'required|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ai_image' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['category_color'] = $this->categories[$validated['category']] ?? 'bg-gray-500';
        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['author_role'] = $validated['author_role'] ?? '';
        $validated['image'] = '';

        // Image uploadée manuellement
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $validated['image'] = '/storage/' . $path;
        }
        // Image générée par l'IA
        elseif (!empty($request->ai_image)) {
            $validated['image'] = $request->ai_image;
        }

        unset($validated['ai_image']);

        if (empty($validated['published_at']) && $validated['is_published']) {
            $validated['published_at'] = now();
        }

        Article::create($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        $categories = $this->categories;
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:155',
            'keywords' => 'nullable|string|max:500',
            'author' => 'required|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['category_color'] = $this->categories[$validated['category']] ?? 'bg-gray-500';
        $validated['is_published'] = $request->boolean('is_published');
        $validated['author_role'] = $validated['author_role'] ?? '';

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image && str_starts_with($article->image, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $article->image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('articles', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        if (empty($validated['published_at']) && $validated['is_published'] && !$article->published_at) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article)
    {
        // Delete image if exists
        if ($article->image && str_starts_with($article->image, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $article->image);
            Storage::disk('public')->delete($oldPath);
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article supprimé avec succès.');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:publish,unpublish,delete',
            'ids' => 'required|array',
            'ids.*' => 'exists:articles,id',
        ]);

        $articles = Article::whereIn('id', $request->ids);

        switch ($request->action) {
            case 'publish':
                $articles->update(['is_published' => true, 'published_at' => now()]);
                $message = count($request->ids) . ' article(s) publié(s).';
                break;
            case 'unpublish':
                $articles->update(['is_published' => false]);
                $message = count($request->ids) . ' article(s) dépublié(s).';
                break;
            case 'delete':
                foreach ($articles->get() as $article) {
                    if ($article->image && str_starts_with($article->image, '/storage/')) {
                        Storage::disk('public')->delete(str_replace('/storage/', '', $article->image));
                    }
                    $article->delete();
                }
                $message = count($request->ids) . ' article(s) supprimé(s).';
                break;
        }

        return redirect()->route('admin.articles.index')->with('success', $message);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $path = $request->file('file')->store('articles', 'public');

        return response()->json([
            'location' => '/storage/' . $path,
        ]);
    }
}
