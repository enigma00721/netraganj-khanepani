<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Photo;

class ImageUploadService
{

    protected $removeImage = 0;  //false
    protected $image_path = '/uploads/images/';

    // @params
    // takes array of image files as parameter and store them in public folder
    // $customerId is last customer row id inserted
    // $editMode is boolean 
    // @info
    // $field_name has name of input field request like customer_photo,lalpurja
    // also save image name in Photo model
    public function storeImage($imageFiles , $customerId ,$editMode)  
    {

        $photo = $this->getPhotoModel($editMode);

        foreach($imageFiles as $field_name => $imageFile)
        {
             //  remove/delete image in edit mode
            if($this->removeImage){
                if(!empty($photo->$field_name)){
                    $this->deleteOldImage($photo->$field_name);
                }
            }

            // Make a image name based on image orignal name and current timestamp and image extension
            $imageName = Str::slug($imageFile->getClientOriginalName()).'_'.time().'.'.$imageFile->getClientOriginalExtension();
            // Get the image, and make it using Image Intervention
            $largeImage = \Image::make($imageFile)->resize(1200, null, function ($constraint) {$constraint->aspectRatio();});
            // Save the images in the 'public/uploads/'  big and small also
            $largeImage->save(public_path() . $this->image_path . $imageName);   
            // dd($imageName);
            $photo->$field_name = $imageName;
        }
        $photo->customer_id = $customerId;
        $photo->save();
        return true;
    }

    // return photo model 
    public function getPhotoModel($editMode)
    {
        if($editMode){
            $model = Photo::where('customer_id','=',$customerId)->first();
            if($model){
                $photo = $model;
                $this->removeImage = 1;
            }
            else{
                $photo = new Photo();
            }
        }else{
            $photo = new Photo();
        }
        return $photo;
    }

    public function deleteOldImage($image_name)
    {
        $file_path = public_path() . $this->image_path . $image_name;
        if (file_exists($file_path)) 
            unlink($file_path);
    }
}