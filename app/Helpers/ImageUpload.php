<?php
/**
 * Created by PhpStorm.
 * User: Mithun
 * Date: 1/16/2016
 * Time: 10:57 AM
 */

namespace App\Helpers;


class ImageUpload
{

    public static function image_upload($image,$file_type_required,$destinationPath)
    {
        if ($image != '') {
            $img_name = ($_FILES['image']['name']);
            $random_number = rand(111, 999);
            $thumb_name = 'thumb_400x400_'.$random_number.'_'.$img_name;
            $newWidth=400;
            $targetFile=$destinationPath.$thumb_name;
            $originalFile=$image;
            $resizedImages 	= ImageResize::resize($newWidth, $targetFile,$originalFile);
            $thumb_image_destination=$destinationPath;
            $thumb_image_name=$thumb_name;
            //$rules = array('image' => 'required|mimes:png,jpeg,jpg');
            $rules = array('image' => 'required|mimes:'.$file_type_required);
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                //$destinationPath = 'uploads/slider_image/';
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = rand(111, 999) . $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);
                $file=array($destinationPath . $image_name, $thumb_image_destination.$thumb_image_name);
                if ($upload_success) {
                    return $file_name = $file;
                }
                else{
                    return $file_name = '';
                }
            }
            else{
                return $file_name = '';
            }
        }
    }
}