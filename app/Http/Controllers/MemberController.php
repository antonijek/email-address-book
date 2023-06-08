<?php

namespace App\Http\Controllers;

use App\Exports\PhoneBook;
use App\Http\Requests\ImageStoreRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Mail\Welcome;
use App\Models\Member;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
     {
        $data =$request->validated();
        $data['password']=Hash::make($data['password']);
        $data['user_id']=auth()->user()->id;
        Member::create($data);
        $file = $request->file('image');
        if($file){
            $path ="storage/" . $request->file('image')->store('images');
            $name = $file->getClientOriginalName();
            $member= Member::where('email',$request->email)->first();
            $member->image()->updateOrCreate([
                'name'=>$name,
                'path'=>$path
            ],[
                'name'=>$name,
                'path'=>$path
            ]);

        }
        Mail::to($request->email)->send(new Welcome());
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        return view('members.edit', ['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, Member $member)
    {
        $file = $request->file('image');
        if ($file) {
            // Delete the previous image
            if ($member->image) {
                $path = str_replace('storage/', '', $member->image->path);
                Storage::delete($path);
                $member->image()->delete();
            }

            $name = $file->getClientOriginalName();
            $path = "storage/" . $file->store('images');

            $member->image()->create([
                'name' => $name,
                'path' => $path
            ]);
        }

        $member->update($request->validated());
        return redirect(route('dashboard'));
    }

    public function destroy(Member $member)
    {
        $member->delete();
        $member->image()->delete();
        return redirect(route('dashboard'));
    }

    public function export(){
$members = auth()->user()->members()->paginate(6);

return Excel::download(new PhoneBook($members),'addressBook.xlsx');
    }
}
