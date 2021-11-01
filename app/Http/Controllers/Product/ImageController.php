<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Image::where('status',1)->latest()->paginate(10);
        return view('admin.product.image.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $image = Image::create($request->except('name'));

        if($request->hasFile('name')){
            $image->name = Storage::put('uploads/file_manager',$request->file('name'));
            $image->save();
        }

        $image->slug = Str::slug($image->name);
        $image->creator = Auth::user()->id;
        $image->save();

        return response()->json([
            'html' => "<option value='".$image->id."'>".$image->name."</option>",
            'value' => $image->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.product.image.edit', ['brand'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $this->validate($request,[
            'icon' => ['required']
        ]);

        $image->update($request->except('icon'));
        if($request->hasFile('icon')){
            $image->logo = Storage::put('uploads/file_manager',$request->file('icon'));
            $image->save();
        }

        $image->slug = Str::slug($image->icon);
        $image->creator = Auth::user()->id;
        $image->save();

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();
        return response('success');
    }
}
