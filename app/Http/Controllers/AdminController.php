<?php

namespace App\Http\Controllers;

use\App\PostJob;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	protected $uploadPath ='/images';

	function index(){
		return view('admin.dashboard');
	}

	function job(){
		return view('admin.posts.job.add');
	}
	function alljob(){
		$jobs = PostJob::all();
		return view('admin.posts.job.index')->with('jobs', $jobs);
	}
	function Postjob(Request $request){

    	            // dd($request->all());
		$this->validate($request, [
			'title'=>'required',
			'company_name'=>'required',
			'location'=>'required',
			'logo'=>'required',
			'description'=>'required'
		]);
		$file = $request->file('logo');
		$fileExtr = strtolower($file->getClientOriginalExtension());
		$imagOriginlName = $file->getClientOriginalExtension();
		$logo_name = md5($imagOriginlName).microtime() . '_upload.'. $fileExtr;
		$location = public_path($this->uploadPath);
		$file->move($location,$logo_name);

		$save = new PostJob;
		$save->title = $request->title;
		$save->company_name = $request->company_name;
		$save->location = $request->location;
		$save->logo = $logo_name;
		$save->description = $request->description;

		$save->save();
		return back();

	}

	public function getUpdate($id){
		$update = PostJob::find($id);
		return view('admin.posts.job.update', compact('update'));
	}

	public function update(Request $request, $id){
		$this->validate($request, [
			'title'=>'required',
			'company_name'=>'required',
			'location'=>'required',
			'description'=>'required'
		]);
		$update = PostJob::find($id);
		if($request->hasFile('logo')){

		$file = $request->file('logo');
		$fileExtr = strtolower($file->getClientOriginalExtension());
		$imagOriginlName = $file->getClientOriginalExtension();
		$logo_name = md5($imagOriginlName).microtime() . '_upload.'. $fileExtr;
		$location = public_path($this->uploadPath);
		$file->move($location,$logo_name);
		unlink($location.'/'.$update->logo);
		$update->logo = $logo_name;

		}

		
		$update->title = $request->title;
		$update->company_name = $request->company_name;
		$update->location = $request->location;
		$update->description = $request->description;

		$update->save();
		return redirect()->route('all.job');
	}

	public function jobDelete($id){
		$delete = PostJob::find($id);
		unlink(public_path('/images/').$delete->logo);
		$delete->delete();
		return back();
	}

}
