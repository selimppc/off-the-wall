<?php

namespace App\Modules\Web\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\ProductGroup;
use DB;


class ProductCategoryController extends Controller
{

	public function couple($main_slug,$sub_slug){

		$product_group = DB::table('groups')
							->where('slug',$main_slug)
							->first();

		if(!empty($product_group)){

			$product_subgroup = DB::table('product_subgroup')
							->where('slug',$sub_slug)
							->where('product_group_id',$product_group->id)
							->first();

				$productdata = DB::table('product')
								->where('product_group_id',$product_group->id)
								->where('product_subgroup_id',$product_subgroup->id)
								->where('preorder','0')
								->where('status','active')
								->orderBy('sort_order','asc')
								->get();
									
				if($product_subgroup->meta_title != ''){
					$title =$product_subgroup->meta_title;
				}else{
					$title =$product_subgroup->title;
				}
				
				$meta_keywords = $product_subgroup->meta_keyword;
				$meta_description = $product_subgroup->meta_desc;

				return view('web::productcategory.all',[
		            'title' => $title,
		            'productdata' => $productdata,
		            'product_subgroup' => $product_subgroup,
					'meta_keywords' => $meta_keywords,
					'meta_description' => $meta_description
		        ]);


		}else{

			$productcategory = DB::table('article')->where('status','active')->where('slug',$sub_slug)->first();

			if(empty($productcategory)){
				return redirect('/');
			}
			
			if($productcategory->meta_title != ''){
				$title =$productcategory->meta_title;
			}else{
				$title =$productcategory->title;
			}
			
			$meta_keywords = $productcategory->meta_keyword;
			$meta_description = $productcategory->meta_desc;

			$product_content = DB::table('article_sub')->where('article_id',$productcategory->id)->get();

			return view('web::productcategory.all_pages',[
	            'title' => $title,
	            'productcategory' => $productcategory,
	            'product_content' => $product_content,
				'meta_keywords' => $meta_keywords,
				'meta_description' => $meta_description
	        ]);
		}
		

	}
	
}