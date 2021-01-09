<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Photo;

class ImageUploadService
{

    // takes array of image files as parameter and store them in public folder
    // $key has name of input field request like customer_photo,lalpurja
    // also save image name in Photo model
    // $customerId is last customer row id inserted
    // $editMode is boolean 
    public function storeImage($imageFiles , $customerId ,$editMode)  
    {
        if($editMode)
            $photo = Photo::where('customer_id','=',$customerId)->first();
        else
            $photo = new Photo();
        foreach($imageFiles as $key => $imageFile)
        {
            // Make a image name based on image orignal name and current timestamp and image extension
            $imageName = Str::slug($imageFile->getClientOriginalName()).'_'.time().'.'.$imageFile->getClientOriginalExtension();
            // Get the image, and make it using Image Intervention
            $largeImage = \Image::make($imageFile)->resize(1200, null, function ($constraint) {$constraint->aspectRatio();});
            // Save the images in the 'public/uploads/'  big and small also
            $largeImage->save(public_path() . '/uploads/images/' . $imageName);   

            $photo->$key = $imageName;
        }
        $photo->customer_id = $customerId;
        $photo->save();
        return true;
    }
}