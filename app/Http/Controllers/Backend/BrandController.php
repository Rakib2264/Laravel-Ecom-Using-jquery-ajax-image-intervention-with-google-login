<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Brand_Gallery;
use App\Models\Category;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class BrandController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.brand.add', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'cat_id' => 'required',

        ]);

        $brand = new Brand();
        if ($request->image) {
            $image = $request->file('image');
            $customName = rand() . "." . $image->getClientOriginalExtension();
            $location = public_path("backend/assets/brand/" . $customName);
            Image::make($image)->resize(300, 200)->save($location);
        }
        $brand->name = $request->name;
        $brand->cat_id = $request->cat_id;
        $brand->image = $customName;
        $brand->save();


        $brandId = Brand::where('name', $request->name)->first();

        if ($request->images) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $customName = rand() . "." . $image->getClientOriginalExtension();
                $location = public_path("backend/assets/brand/gallery/" . $customName);
                Image::make($image)->resize(300, 200)->save($location);


                $brand_gallery = new Brand_Gallery();
                $brand_gallery->brand_id = $brandId->id;
                $brand_gallery->images = $customName;
                $brand_gallery->save();
            }
        }
        return back();
    }

    public function show()
    {
        $brands = Brand::all();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    public function view($id)
    {
        $brand = Brand::find($id);
        $brand_gallery = Brand_Gallery::where('brand_id', $brand->id)->get();
        return view('backend.pages.brand.view', compact('brand', 'brand_gallery'));
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        $cats = Category::orderBy('id')->get();
        $brand_gallery = Brand_Gallery::where('brand_id', $brand->id)->get();
        return view('backend.pages.brand.edit', compact('brand', 'brand_gallery', 'cats'));
    }

    public function update(Request $req, $id)
    {

        $brand = Brand::find($id);
        if ($req->image) {
            // old image delete
            if (File::exists(public_path("backend/assets/brand/" . $brand->image))) {
                File::delete(public_path("backend/assets/brand/" . $brand->image));

                // Then New Image upload
                $image = $req->file('image');
                $customName = rand() . "." . $image->getClientOriginalExtension();
                $location = public_path("backend/assets/brand/" . $customName);
                Image::make($image)->resize(300, 200)->save($location);
                $brand->name = $req->name;
                $brand->cat_id = $req->cat_id;
                $brand->image = $customName;
                $brand->update();
            }
        } else {
            $brand->name = $req->name;
            $brand->cat_id = $req->cat_id;
            $brand->update();
        }
        return to_route('showbrand');
    }


    public function deletegallery($id)
    {

        $deletegallery = Brand_Gallery::findOrFail($id);
        if (File::exists(public_path("backend/assets/brand/gallery/" . $deletegallery->images))) {
            File::delete(public_path("backend/assets/brand/gallery/" . $deletegallery->images));
        }
        $deletegallery->delete();
        return back();
    }


    public function addgallery(Request $request, $id)
    {
        if ($request->images) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $customName = rand() . "." . $image->getClientOriginalExtension();
                $location = public_path("backend/assets/brand/gallery/" . $customName);
                Image::make($image)->resize(300, 200)->save($location);
                $brand_gallery = new Brand_Gallery();
                $brand_gallery->brand_id = $id;
                $brand_gallery->images = $customName;
                $brand_gallery->save();
            }
        }

        return back();
    }


    public function deletebrand($id)
    {
        // fast of all beand gallery delete korta hoba then brand aga vrand delete korle galery id pabo nah delete korta o parbo nah code error khaba



        $galery_delete = Brand_Gallery::where('brand_id', $id)->get();
        foreach ($galery_delete as $galery_delete) {
            if (File::exists(public_path("backend/assets/brand/gallery/" . $galery_delete->images))) {
                File::delete(public_path("backend/assets/brand/gallery/" . $galery_delete->images));
                $galery_delete->delete();
            }
        }
        $brand_delete = Brand::find($id);
        if (File::exists(public_path("backend/assets/brand/" . $brand_delete->image))) {
            File::delete(public_path("backend/assets/brand/" . $brand_delete->image));
            $brand_delete->delete();
        }

        return back();
    }

    final public function insert(Request $request){
       // js validator
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'cat_id'=>'required',
            'image'=>'required',
            'images'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'failed',
                'errors'=>$validator->messages()
            ]);
        }else{

            $brand = new Brand();
            if ($request->image) {
                $image = $request->file('image');
                $customName = rand() . "." . $image->getClientOriginalExtension();
                $location = public_path("backend/assets/brand/" . $customName);
                Image::make($image)->resize(300, 200)->save($location);
            }
            $brand->name = $request->name;
            $brand->cat_id = $request->cat_id;
            $brand->image = $customName;
            $brand->save();


            $brandId = Brand::where('name', $request->name)->first();

            if ($request->images) {
                $images = $request->file('images');
                foreach ($images as $image) {
                    $customName = rand() . "." . $image->getClientOriginalExtension();
                    $location = public_path("backend/assets/brand/gallery/" . $customName);
                    Image::make($image)->resize(300, 200)->save($location);


                    $brand_gallery = new Brand_Gallery();
                    $brand_gallery->brand_id = $brandId->id;
                    $brand_gallery->images = $customName;
                    $brand_gallery->save();
                }
            }
            return response()->json([
                'msg'=>"Data Successfully Inserted"
            ]);
        }
    }
}
