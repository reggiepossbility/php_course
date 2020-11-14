<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\User;
use App\Traits\SaveJoinTrait;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    use SaveJoinTrait;

    public function bookJoin($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->book_join;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['book_join' => $new_str_ids]);

        return redirect()->back()->with('success','加入成功');
    }

    public function skillJoin($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->skill_join;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['skill_join' => $new_str_ids]);

        return redirect()->back()->with('success','加入成功');
    }

    public function charityJoin($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->charity_join;
        $new_str_ids = $this->addId($old_str_ids, $id);
        $user->update(['charity_join' => $new_str_ids]);

        return redirect()->back()->with('success','加入成功');
    }



    
    public function bookJoinDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->book_join;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['book_join' => $new_str_ids]);

        return redirect()->back()->with('success','退出成功');
    }

    public function skillJoinDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->skill_join;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['skill_join' => $new_str_ids]);

        return redirect()->back()->with('success','退出成功');
    }

    public function charityJoinDelete($id)
    {
        $user = auth()->user();
        $old_str_ids = $user->charity_join;
        $new_str_ids = $this->deleteId($old_str_ids, $id);
        $user->update(['charity_join' => $new_str_ids]);

        return redirect()->back()->with('success','退出成功');
    }

}
