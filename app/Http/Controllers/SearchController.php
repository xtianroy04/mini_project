<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Checkin;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $members = Member::where('code', 'like', '%' . $query . '%')->get();

        if ($members->isNotEmpty()) {
            $member = $members->first();
            if ($member->code === $query) {
                $checkin = new Checkin();
                $checkin->member_id = $member->id;
                $checkin->save();
            }
        }
          return view('welcome', compact('members'));
    }
}
