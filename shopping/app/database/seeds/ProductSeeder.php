<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 9:35 AM
 */
class ProductSeeder extends Seeder{
   public function run(){
      Product::truncate();
      $j = 0;
      $k = 0;
      for($i=1; $i<=30; $i++){
         $arr = array(
            'name' => "product_$i",
            'image' => "lib/images/products/default-product.jpg",
            'image_small' => "lib/images/products/default-small.jpg",
            'description' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet porttitor eros. Praesent quis diam placerat, accumsan velit interdum, accumsan orci. Nunc libero sem, elementum in semper in, sollicitudin vitae dolor. Etiam sed tempus nisl. Integer vel diam nulla. Suspendisse et aliquam est. Nulla molestie ante et tortor sollicitudin, at elementum odio lobortis. Pellentesque neque enim, feugiat in elit sed, pharetra tempus metus. Pellentesque non lorem nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                    <p>Sed consequat orci vel rutrum blandit. Nam non leo vel risus cursus porta quis non nulla. Vestibulum vitae pellentesque nunc. In hac habitasse platea dictumst. Cras egestas, turpis a malesuada mollis, magna tortor scelerisque urna, in pellentesque diam tellus sit amet velit. Donec vel rhoncus nisi, eget placerat elit. Phasellus dignissim nisl vel lectus vehicula, eget vehicula nisl egestas. Duis pretium sed risus dapibus egestas. Nam lectus felis, sodales sit amet turpis se.</p>",
            'quantity' => rand(10,100),
            'price' => rand( 10000000 , 30000000),
            'rate' => rand(1,5),
            'tag_id' => rand(1,4),
            'manufacture_id' => rand(1,6),
            'slug' => Str::slug("product_$i"),
            'block' => 1
         );
         if($j==4){
            $arr['price_sale'] = rand(10,50);
            $j=0;
         }
         if($k==6){
            $arr['price_bestsaller'] = rand(50,70);
            $k=0;
         }
         Product::create($arr);
         $j++;$k++;
      }
   }
}