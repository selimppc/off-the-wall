<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 11/24/15
 * Time: 4:36 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;
class Article extends Model
{

    protected $table = 'article';

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'type',
        'sub_page_id',
        'featured_image',
        'featured_image_2',
        'thumbnail',
        'thumbnail_2',
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'status',
        'sort_order'
    ];

    public static function scopeAritcleMenu($query){
        $query = array(
            ''=>'Select Type for Spefic Menu',
            'home-page'=>'Home Page',
            'about-us'=>'About Us',
            'photoshop-clipping-path'=>'Photoshop Clipping Path',
            'image-masking'=>'Image Masking',
            'color-separation-correction'=>'Color separation / Correction',
            'photo-retouching'=>'Photo Retouching',
            'image-manipulation'=>'Image Manipulation',
            'shadow-and-reflection-creation'=>'Shadow and Reflection Creation',
            'e-commerce-image-optimization'=>'E-commerce Image optimization',
            'how-it-works'=>'How It Works',
            'our-works'=>'Our-Works',
            'free-trial'=>'Free Trial',
            'contact-us'=>'Contact Us'
        );
        return $query;
    }



}