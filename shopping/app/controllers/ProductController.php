<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/4/2014
 * Time: 11:23 AM
 */
class ProductController extends BaseController{

   public function __construct(){}

   /**
    * [getIndex description]
    * @return [type] [description]
    */
   public function getIndex(){
      return View::make('product.product');
   }

   /**
    * [getSingle description]
    * @return [type] [description]
    */
   public function getSingle($slug){
      $product = Product::whereSlug($slug)->with('product_infomations','product_images')->first();
      $data['product'] = $product;
      return View::make('product.single',$data);
   }

   /**
    * [getAjaxAddtocart description]
    * @return [type] [description]
    */
   public function getAjaxAddtocart(){
      if(Session::has('array_slug')){
         if(in_array($_GET['slug'], Session::get('array_slug'))){
            $data = array('title'=>'Thông Báo','body'=>'Hàng hóa đã tồn tại!');
         }else{
            Session::push('array_slug', $_GET['slug']);
            $count = $_GET['count']+1;
            $old_price = str_replace(".","", $_GET['old_price']);
            $new_price = (int)$old_price+(int)$_GET['price'];
            Session::put('price_cart',adddotstring($new_price));
            Session::put('count_product',$count);
            $data = array('title'=>'Thông Báo','body'=>'Thêm sản phẩm thành công !','count'=>$count,'price'=>adddotstring($new_price));
         }
      }else{
         Session::push('array_slug', $_GET['slug']);
         $count = $_GET['count']+1;
         $new_price = (int)$_GET['old_price']+(int)$_GET['price'];
         Session::put('price_cart',adddotstring($new_price));
         Session::put('count_product',$count);
         $data = array('title'=>'Thông Báo','body'=>'Thêm sản phẩm thành công !','count'=>$count,'price'=>adddotstring($new_price));
      }
      return json_encode($data);
   }

   /**
    * [getCart description]
    * @return [type] [description]
    */
   public function getAddProductCart(){
        if(Session::has('array_slug')){
            foreach(Session::get('array_slug') as $item){
               $product[] = Product::whereSlug($item)->first();
            }
            return renderProductCart($product);
        }
   }

   /**
    * [getRemoveProductCart description]
    * @return [type] [description]
    */
   public function getRemoveProductCart(){
      if($_GET['count'] == 1){
         $count = $_GET['count']-1;
         $old_price = str_replace(".","", $_GET['old_price']);
         $new_price = (int)$old_price-(int)$_GET['price'];
         $new_slug = array_diff(Session::get('array_slug'),array($_GET['slug']));
         Session::forget('price_cart');
         Session::forget('count_product');
         Session::forget('array_slug');
         $data = array('title'=>'Thông Báo','body'=>'Xóa thành công !','count'=>$count,'price'=>adddotstring($new_price));
         return json_encode($data);
      }else{
         $count = $_GET['count']-1;
         $old_price = str_replace(".","", $_GET['old_price']);
         $new_price = (int)$old_price-(int)$_GET['price'];
         Session::put('price_cart',adddotstring($new_price));
         Session::put('count_product',$count);
         $new_slug = array_diff(Session::get('array_slug'),array($_GET['slug']));
         Session::put('array_slug', $new_slug);
         $data = array('title'=>'Thông Báo','body'=>'Xóa thành công !','count'=>$count,'price'=>adddotstring($new_price));
         return json_encode($data);
      }
   }
/*****************************************************/
/*                   ADMIN PAGE                      */

   /**
    * @param $slug
    * @return mixed
    */
    public function getProduct($slug){
       $data['content_header'] = ucfirst($slug);
       $values = Product::getProduct($slug);
       $data['values'] = $values;
       $data['slug_tag'] = $slug;
       return View::make('admin.product.product',$data);
    }

   /**
    * @return mixed
    */
   public function deleteProduct(){
      $value = Product::whereId(Input::get('product_id'))->first();
      $images = ProductImage::whereProduct_id(Input::get('product_id'))->get();
      $this->deleteImage($value['image'],'lib/images/products/default-product.jpg');
      $this->deleteImage($value['image_small'],'lib/images/products/default-small.jpg');
      $value->delete();
      ProductInfomation::whereProduct_id(Input::get('product_id'))->delete();
      foreach($images as $item){
         $this->deleteImage($item->image,'lib/images/products/default-product-gallery.jpg');
         $this->deleteImage($item->image_small,'lib/images/products/default-gallery-thumb.jpg');
         $item->delete();
      }
      Session::flash('success','Xoa Thanh Cong !');
      return Redirect::back();
   }

   /**
    * @return mixed
    */
   public function disableProduct(){
      $disable = Product::whereId(Input::get('product_id'))->update(array('block'=>0));
      Session::flash('success','Disable Thanh Cong !');
      return Redirect::back();
   }

   /**
    * @return mixed
    */
   public function activeProduct(){
      $disable = Product::whereId(Input::get('product_id'))->update(array('block'=>1));
      Session::flash('success','Active Thanh Cong !');
      return Redirect::back();
   }

   /**
    * [newProduct description]
    * @param  [type] $slug [description]
    * @return [type]       [description]
    */
   public function newProduct($slug){
      $data['tag_id'] = Tag::whereSlug($slug)->first();
      $manufactures = Manufacture::all();
      foreach($manufactures as $manufacture){
         $mf[$manufacture->id] = $manufacture->name;
      }
      $data['content_header'] = "Add New ".ucfirst($slug)." Product";
      $data['url'] = URL::route('product.new.save',$slug);
      $data['submit'] = "Add New Product";
      $data['manufacture'] = $mf;
      return View::make('admin.product.new',$data);
   }

   /**
    * [infomationNewProduct description]
    * @param  [type] $slug [description]
    * @return [type]       [description]
    */
   public function saveNewProduct($slug){
      $newProduct = Input::all();
      unset($newProduct['image']);
      $destinationPath = 'lib/images/products/';
      if(Input::hasFile('image')){
         $filename = "product_".Str::slug(Input::get('name')).".".Input::file('image')->getClientOriginalExtension();
         $filename_small = "product_".Str::slug(Input::get('name'))."_small.".Input::file('image')->getClientOriginalExtension();
         Input::file('image')->move($destinationPath, $filename);
         $img = $destinationPath.$filename;
         $img_small = $destinationPath.$filename_small;

         $image = new ResizeImages($img);
         $image->resizeImage(73,73,'exact');
         $image->saveImage($img_small,100);
         $newProduct['image'] = $img;
         $newProduct['image_small'] = $img_small;
      }
      $product_id = Product::saveNewProduct($newProduct);
      if(Input::hasFile('image_slide')){
         foreach(array_filter(Input::file('image_slide')) as $key => $image_slide){
            $tmp_slide = "product_".Str::slug(Input::get('name'))."_$key.".$image_slide->getClientOriginalExtension();
            $tmp_slide_thumb = "product_".Str::slug(Input::get('name'))."_thumb_$key.".$image_slide->getClientOriginalExtension();
            $image_slide->move($destinationPath, $tmp_slide);
            $tmp_name = $destinationPath.$tmp_slide;
            $tmp_name_thmub = $destinationPath.$tmp_slide_thumb;
            $image = new ResizeImages($tmp_name);
            $image->resizeImage(67,60,'exact');
            $image->saveImage($tmp_name_thmub,100);
            $array_image_slide[$key]['image'] = $tmp_name;
            $array_image_slide[$key]['image_small'] = $tmp_name_thmub;
         }
      }else{
         for($i=1;$i<=4;$i++){
            $array_image_slide[$i]['image'] = 'lib/images/products/default-product-gallery.jpg';
            $array_image_slide[$i]['image_small'] = 'lib/images/products/default-gallery-thumb.jpg';
         }
      }
      ProductInfomation::saveNewInfoProduct(Input::get('info'),Input::get('name'),$product_id);
      ProductImage::saveImagePrduct($array_image_slide,$product_id);
      Session::flash('success','Thêm mới thành công !');
      return Redirect::to('admin/product/'.$slug);
   }

   /**
    * [editProduct description]
    * @param  [type] $slug [description]
    * @return [type]       [description]
    */
   public function editProduct($slug){
      $product = Product::whereSlug($_GET['product'])->with('product_infomations')->first();
      $data['content_header'] = "Edit ".$product['name'];
      $data['product'] = $product;
      $data['url'] = URL::route('product.edit.save',$slug);
      $data['submit'] = "Edit Product";
      return View::make('admin.product.new',$data);
   }

   /**
    * [infoEditProduct description]
    * @param  [type] $slug [description]
    * @return [type]       [description]
    */
   public function saveEditProduct($slug){
      $edit_product = Input::all();
      unset($edit_product['hidden_description']);
      unset($edit_product['hidden_content']);
      $data['content_header'] = "Edit Infomation";
      $destinationPath = 'lib/images/products/';
      if(Input::hasFile('image')){
         $this->deleteImage(Input::get('hidden_image'),$destinationPath.'default-product.jpg');
         $this->deleteImage(Input::get('hidden_image_small'),$destinationPath.'default-small.jpg');
         $filename = "product_".Str::slug(Input::get('name')).".".Input::file('image')->getClientOriginalExtension();
         $filename_small = "product_".Str::slug(Input::get('name'))."_small.".Input::file('image')->getClientOriginalExtension();
         Input::file('image')->move($destinationPath, $filename);
         $img = $destinationPath.$filename;
         $img_small = $destinationPath.$filename_small;
         $image = new ResizeImages($img);
         $image->resizeImage(73,73,'exact');
         $image->saveImage($img_small,100);
      }else{
         unset($edit_product['image']);
         $img = null;
      }
      Product::saveProduct($edit_product,$img,$img_small);
      ProductInfomation::saveEditInfomation(Input::get('hidden_product_id'),Input::get('info'),Input::get('name'));
      Session::flash('success','Edit thành công !');
      return Redirect::to('admin/product/'.$slug);
   }

   /**
    * @param $new_path
    * @param $old_path
    */
   private function deleteImage($new_path,$old_path){
      if($new_path != $old_path){
         if(File::exists($new_path)){
            File::delete($new_path);
         }
      }
   }

/*                       END                         */
/*****************************************************/
}