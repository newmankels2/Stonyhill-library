<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Member;

class MemberController extends Controller
{
    public function viewMember()
    {
        $member = Member::all();
        return response()->json($member, Response::HTTP_OK);
    }

    public function saveMember(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:members,email',
            'address' => 'required',
            'phone_number' => 'required'
        ]);

        Member::create($request->all());

        return response()->json('Member save successfully');
    }

    public function updateMember(Request $request, $id)
    {
        $member = Member::find($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:members,email',
            'address' => 'required',
            'phone_number' => 'required'
        ]);

        $member->update($request->all());

        return response()->json('Member updated succesfully');
    }

    public function deleteMember($id)
    {
        $member = Member::find($id);
        $member->delete();
        return response()->json('Member deleted succesfully', Response::HTTP_OK);
    }
}
