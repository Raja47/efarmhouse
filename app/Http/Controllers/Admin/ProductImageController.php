<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Image;

class ProductImageController extends Controller
{
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function upload(Request $request)
    {
        
        $product = $this->productRepository->findProductById($request->product_id);

        if ( $request->has('image')) {
            
            $water_mark_medium = Image::make( \Storage::disk('public')->get(config('settings.watermark_image')))->resize(400,400, function ($constraint) { $constraint->aspectRatio(); } )->opacity(10);

            $water_mark_original = Image::make( \Storage::disk('public')->get(config('settings.watermark_image')))->resize(400,400, function ($constraint) { $constraint->aspectRatio(); } )->opacity(10);            

            $fileName = str_random(4).'-'.$product->slug;
            $file  = $fileName.'.'.$request->image->getClientOriginalExtension();


            $originalImage = Image::make($request->image);
            $originalImage->insert($water_mark_original,'center');
            $originalImage->encode($request->image->getClientOriginalExtension() ,100);
            \Storage::disk('public')->put( 'products/original/'.$file , $originalImage );

            $mediumImage = Image::make( $request->image )->resize( config('settings.medium_image_width' ), config('settings.medium_image_height'), function ($constraint) { $constraint->aspectRatio(); } );
            $mediumImage->insert($water_mark_medium,'center');
            $mediumImage->encode($request->image->getClientOriginalExtension() , config('settings.medium_image_quality'));
            \Storage::disk('public')->put( 'products/medium/'.$file , $mediumImage );


            $smallImage = Image::make($request->image)->resize(config('settings.small_image_width'), config('settings.small_image_height'), function ($constraint) { $constraint->aspectRatio(); } )
              ->encode($request->image->getClientOriginalExtension() , config('settings.small_image_quality'));
            \Storage::disk('public')->put( 'products/small/'.$file , $smallImage );


            $productImage = new ProductImage([  
                'full'      =>  $file ,
            ]);
        
            $product->images()->save($productImage);            
        }

        return response()->json(['status' => 'Success']);
    }


    public function show()
    {
      
      $img = asset('storage/products/Sq7qm3nMvR3FiTr9bmaiJWtHP.jpg');
      $img = Image::make($img);
    }    


    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}
