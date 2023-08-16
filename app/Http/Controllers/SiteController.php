<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

use App\Http\Controllers\Controller;


class SiteController extends Controller

{
  public function getCategories()
  {
      $categories = BlogCategory::get();
      return response()->json($categories);
  }
  public function getBlogsByCategory($id)
  {
      $blogs = Blog::where('blog_category_id',$id)->get();
      return response()->json($blogs);
  }
  public function getBlogBySlug($slug)
  {
      $blog = Blog::where('slug',$slug)->get();
      return response()->json($blog);
  }
  public function getBlogs($page)
  {
      if ($page>1) {
        $blogs = Blog::skip(($page-1)*20)->take(20)->get();
      }else {
        $blogs = Blog::skip(0)->take(20)->get();
      }
      return response()->json($blogs);
  }
}
