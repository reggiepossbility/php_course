<?php

namespace App\Http\Controllers;

use App\Models\Save;
use App\Models\User;
use App\Traits\SaveJoinTrait;
use Illuminate\Http\Request;

class SaveController extends Controller
{

    use SaveJoinTrait;

    public function bookSave($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->book_save;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['book_save' => $new_str_ids]);

        return redirect()->back()->with('success','收藏成功');
    }

    public function skillSave($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->skill_save;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['skill_save' => $new_str_ids]);

        return redirect()->back()->with('success','收藏成功');
    }

    public function CharitySave($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->charity_save;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['charity_save' => $new_str_ids]);

        return redirect()->back()->with('success','收藏成功');
    }

    public function ArticleSave($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->article_save;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['article_save' => $new_str_ids]);

        return redirect()->back()->with('success','收藏成功');
    }






    public function bookSaveDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->book_save;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['book_save' => $new_str_ids]);

        return redirect()->back()->with('success','取消收藏成功');
    }

    public function skillSaveDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->skill_save;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['skill_save' => $new_str_ids]);

        return redirect()->back()->with('success','取消收藏成功');
    }

    public function charitySaveDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->charity_save;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['charity_save' => $new_str_ids]);

        return redirect()->back()->with('success','取消收藏成功');
    }

    public function articleSaveDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->article_save;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['article_save' => $new_str_ids]);

        return redirect()->back()->with('success','取消收藏成功');
    }

}
