<?php

namespace App\Http\Controllers;

use App\Image;
use App\Services\MediaService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index()
	{
		$users    = User::all();
        $images   = Image::all();

        return view('index', compact('users', 'images'));
    }

    public function store(Request $request)
    {
    	User::create([
    		'name' 		=> $request->name,
    		'email'		=> $request->email,
    		'password'	=> bcrypt($request->password)
    	]);

    	return redirect()->back();
    }

    public function edit($tenant, $id)
    {
    	$user = User::find($id);

    	return view('edit', compact('user'));
    }

    public function update($tenant, $id, Request $request)
    {
    	$user = User::find($id);
    	$user->update($request->all());

    	return redirect()->route('index', $request->tenant);
    }

    public function delete($tenant, $id, Request $request)
    {
    	$user = User::find($id);
    	
    	if($user){
    		$user->delete();
    	}

    	return redirect()->back();
    }

    public function upload(Request $request)
    {
        $media = MediaService::uploadMedia($request->file('file'), 'image');
        Image::create(['media_id' => $media->id]);

        return redirect()->back();
    }
}
