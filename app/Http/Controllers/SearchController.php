<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Charity;
use App\Models\Skill;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function bookSearch(Request $request)
    {
        $books = Book::where('name', "LIKE", '%' . $request->search . '%')->get();
        return view('categories.books.index', compact('books'));
    }
    public function skillSearch(Request $request)
    {
        $skills = Skill::where('name', "LIKE", '%' . $request->search . '%')->get();
        return view('categories.skills.index', compact('skills'));
    }
    public function charitySearch(Request $request)
    {
        $charities = Charity::where('name', "LIKE", '%' . $request->search . '%')->get();
        return view('categories.charities.index', compact('charities'));
    }
    public function articleSearch(Request $request)
    {
        $articles = Article::where('title', "LIKE", '%' . $request->search . '%')->get();
        return view('categories.articles.index', compact('articles'));
    }
}
