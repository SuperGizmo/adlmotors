<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Image;
use Validator;
use UploadImage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.list.images', [
            'pageImages' => Image::where('imageType', '=', 'page')->get(),
            'backgroundImages' => Image::where('imageType', '=', 'background')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // getting all of the post data
        $files = Input::file('location');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;

        foreach($files as $file) {
            $rules = array('location' => 'required|mimes:png,gif,jpeg');
            $validator = Validator::make(array('location'=> $file), $rules);
            if($validator->passes()){
                $destinationPath = 'images';
                $filename = md5(microtime()).$file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount ++;

                // now we upload the images

                // open an image file
                $img = UploadImage::make($destinationPath."/".$filename);

                $sizes = array(1500,750,500,300,250,75,50);
                foreach($sizes as $size)
                {
                    $img->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($destinationPath.'/'.$size.'/'.$filename);
                }

                
                // now add the file to the db

                $image = new Image;
                $image->name = $request->input('name');
                $image->location = $filename;
                $image->imageType = $request->input('imageType');
                $image->save();
            }
        }
        if($uploadcount == $file_count){
            return redirect('/admin/listImage')->with('success', 'Image(s) Added!');
        } 
        else {
            return redirect('/admin/newImage')->with('error', 'Image(s) Not Added!');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        if(count($image) > 0)
        {
            $image->delete();
        }
        
        return redirect('/admin/listImage')->with('success', 'Image Removed!');
    }

    public function pageImages($pageId)
    {
        return view('admin.list.pageImages', [
            'page' => Page::find($pageId), 
            'images' => Image::where('imageType', '=', 'page')->get()
            ]);
    }

    public function addImageToPage($pageId, $imageId)
    {
        Page::find($pageId)->images()->attach($imageId);
        return redirect('/admin/pageImages/'.$pageId)->with('success', 'Image Attached!');
    }

    public function removeImageToPage($pageId, $imageId)
    {        
        Page::find($pageId)->images()->detach($imageId);
        return redirect('/admin/pageImages/'.$pageId)->with('success', 'Image Detached!');
    }
}
