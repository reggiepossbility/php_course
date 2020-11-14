<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Charity;
use App\Models\Skill;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if ($user->email == $request->email) {
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|email|',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|',
            ]);
        } else {
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|',
            ]);
        }

        if ($validate) {
            $user->update($request->all());
        }

        if ($request->image != null) {
            $image = $request->file('image');
            $name = $user->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profiles/');
            $image->move($destinationPath, $name);
        }

        return redirect()->route('pro.home', $user)->with('success','更新成功');
    }

    public function passwordEdit()
    {
        $user = auth()->user();
        return view('profile.password_edit');
    }

    public function passwordUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'same:new_password',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update(['password' => Hash::make($request->new_password)]);
            return redirect()->route('pro.home', $user)->with('success','更新成功');;
        } else {
            return redirect()->back()->with('error','更新失敗');
        }
        return redirect()->back()->with('error','更新失敗');
    }

    public function delete()
    {
        $user = auth()->user();
        $book_ids = Book::where('user_id', $user->id)->pluck('id')->toArray();
        $skill_ids = Skill::where('user_id', $user->id)->pluck('id')->toArray();
        $charity_ids = Charity::where('user_id', $user->id)->pluck('id')->toArray();
        $article_ids = Article::where('user_id', $user->id)->pluck('id')->toArray();
        
        $users = User::all();

        
        foreach ($users as $user) {
            $book_save_arr = explode(',', $user->book_save);
            $book_save_diff_arr = array_diff($book_save_arr, $book_ids);
            $new_book_save = implode(",",$book_save_diff_arr);
            if($new_book_save == "") {
                $new_book_save = "0";
            }

            $book_join_arr = explode(',', $user->book_join);
            $book_join_diff_arr = array_diff($book_join_arr, $book_ids);
            $new_book_join = implode(",",$book_join_diff_arr);
            if($new_book_join == "") {
                $new_book_join = "0";
            }

            $skill_save_arr = explode(',', $user->skill_save);
            $skill_save_diff_arr = array_diff($skill_save_arr, $skill_ids);
            $new_skill_save = implode(",",$skill_save_diff_arr);
            if($new_skill_save == "") {
                $new_skill_save = "0";
            }

            $skill_join_arr = explode(',', $user->skill_join);
            $skill_join_diff_arr = array_diff($skill_join_arr, $skill_ids);
            $new_skill_join = implode(",",$skill_join_diff_arr);
            if($new_skill_join == "") {
                $new_skill_join = "0";
            }

            $charity_save_arr = explode(',', $user->charity_save);
            $charity_save_diff_arr = array_diff($charity_save_arr, $charity_ids);
            $new_charity_save = implode(",",$charity_save_diff_arr);
            if($new_charity_save == "") {
                $new_charity_save = "0";
            }

            $charity_join_arr = explode(',', $user->charity_join);
            $charity_join_diff_arr = array_diff($charity_join_arr, $charity_ids);
            $new_charity_join = implode(",",$charity_join_diff_arr);
            if($new_charity_join == "") {
                $new_charity_join = "0";
            }

            $article_save_arr = explode(',', $user->article_save);
            $article_save_diff_arr = array_diff($article_save_arr, $article_ids);
            $new_article_save = implode(",",$article_save_diff_arr);
            if($new_article_save == "") {
                $new_article_save = "0";
            }

            $user->update([
                'book_save' => $new_book_save,
                'book_join' => $new_book_join,
                'skill_save' => $new_skill_save,
                'skill_join' => $new_skill_join,
                'charity_save' => $new_charity_save,
                'charity_join' => $new_charity_join,
                'article_save' => $new_article_save,
            ]);
            
        }

        $user = auth()->user();

        Book::whereIn('id', $book_ids)->delete();
        Skill::whereIn('id', $skill_ids)->delete();
        Charity::whereIn('id', $charity_ids)->delete();
        Article::whereIn('id', $article_ids)->delete();

        unlink('images/profiles/' . $user->id . '.jpg');

        $user->delete();

        return redirect()->route('login')->with('success','刪除成功');

    }

    public function home(User $user)
    {
        return view('profile.home', compact('user'));
    }

    public function article(User $user)
    {
        $articles = Article::where('user_id', $user->id)->get();
        return view('profile.categories.articles.index', compact('user', 'articles'));
    }

    public function book(User $user)
    {
        $books = Book::where('user_id', $user->id)->get();
        return view('profile.categories.books.index', compact('user', 'books'));
    }

    public function skill(User $user)
    {
        $skills = Skill::where('user_id', $user->id)->get();
        return view('profile.categories.skills.index', compact('user', 'skills'));
    }

    public function charity(User $user)
    {
        $charities = Charity::where('user_id', $user->id)->get();
        return view('profile.categories.charities.index', compact('user', 'charities'));
    }

    public function bookJoin(User $user)
    {
        $strs = $user->book_join;
        $strArr = explode(",", $strs);
        $books = Book::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.books.join', compact('user', 'books'));
    }

    public function skillJoin(User $user)
    {

        $strs = $user->skill_join;
        $strArr = explode(",", $strs);
        $skills = Skill::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.skills.join', compact('user', 'skills'));
    }

    public function charityJoin(User $user)
    {
        $strs = $user->charity_join;
        $strArr = explode(",", $strs);
        $charities = Charity::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.charities.join', compact('user', 'charities'));
    }

    public function bookSave(User $user)
    {
        $strs = $user->book_save;
        $strArr = explode(",", $strs);
        $books = Book::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.books.save', compact('user', 'books'));
    }

    public function skillSave(User $user)
    {
        $strs = $user->skill_save;
        $strArr = explode(",", $strs);
        $skills = Skill::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.skills.save', compact('user', 'skills'));
    }

    public function charitySave(User $user)
    {
        $strs = $user->charity_save;
        $strArr = explode(",", $strs);
        $charities = Charity::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.charities.save', compact('user', 'charities'));
    }

    public function articleSave(User $user)
    {
        $strs = $user->article_save;
        $strArr = explode(",", $strs);
        $articles = Article::whereIn('id', $strArr)->orderByRaw('FIELD (id,' . $strs . ')')->get();
        return view('profile.categories.articles.save', compact('user', 'articles'));
    }
}
