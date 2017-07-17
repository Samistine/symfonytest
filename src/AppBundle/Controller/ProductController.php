<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bigcommerce\Api\Client as Bigcommerce;

Bigcommerce::configure(array(
	'store_url' => 'https://store-kq7kxdxeej.mybigcommerce.com',
	'username'	=> 'jeff',
	'api_key'	=> 'b308ceef29f8b8af51e6b61fc9cdb6016e7a0880'
));

$ping = Bigcommerce::getTime();

//if ($ping) echo $ping->format('    H:i:s     z');

class ProductController extends Controller
{
    /**
     * @Route("/products", name="products")
     */
    public function consume(Request $request)
    {
      $ping = Bigcommerce::getTime();
      $count = Bigcommerce::getProductsCount();
      $products = Bigcommerce::getProducts();

      if ($ping) $ping = $ping->format('H:i:s');
      //json_decode(json_encode($products[1]->images)))
      //print_r(var_dump($products[1]->images);
      // $images = $products[1]->images;
      // var_export($images[0].get('fields'));

      // foreach ($images as $image) {
      //   echo var_export($image);
      // }

      // replace this example code with whatever you need
      return $this->render('store.html.twig', [
          'storeTime' => $ping,
          'itemCount' => $count,
          'products'  => $products
      ]);
    }
}
