<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * AJAX: Authenticated user wants to follow user w/ $id
     */
    public function follow($follow_id)
    {
        Follower::create([
            'user_id' => Auth::id(),
            'follow_id' => $follow_id
        ]);
    }

    /**
     * AJAX: Authenticated user wants to un-follow $user
     */
    public function unfollow($follow_id)
    {
        Follower::where('user_id', Auth::id())->where('follow_id', $follow_id)->delete();
    }

}
