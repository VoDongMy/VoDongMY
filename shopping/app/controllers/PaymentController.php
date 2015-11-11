<?php

use PayPal\Api\PaymentExecution;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\CreditCard;
use PayPal\Api\CreditCardToken;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Payer;
use PayPal\Api\Payee;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
// include('../sdk_config.ini');
class PaymentController extends BaseController{

    public function getPaymentReturn(){
        // echo "fdsfsd";
        // exit();
        $success = $_GET['success'];
        if($success == 'true'){
            $order_id = $_GET['order_id'];
            $tmpTransaction = TmpTransaction::whereOrderId($order_id)->get()->first()->toArray();
            $payment = $this->executePayment($tmpTransaction['payment_id'], $_GET['PayerID']);
            $tran = new Transaction();
            $tran->setTransactions($payment->getTransactions());
            $response = json_decode($payment->toJSON());
            echo "<pre>";
            print_r($response);
            exit();
        }else{
            return Redirect::to('/product');
        }
    }

    public function getPaymentCart(){
        $values = Session::get('payment');
        foreach($values as $key => $value){
            $product[$key]['name'] = $value['name'];
            $price = round((int)$value['price'] / 21270);
            $product[$key]['price'] = $price;
            $product[$key]['quantity'] = 1;
            $product[$key]['product_id'] = $value['id'];
        }
        $tmpTransaction = new TmpTransaction;

        $st = Str::random(16);

        $baseUrl = URL::to('/product/payment/return?order_id=' . $st);

        // $value[1]['name'] = "sản phẩm 1";
        // $value[1]['price'] = "20000";
        // $value[1]['quantity'] = "1";
        // $value[1]['product_id'] = "3";
        // $value[2]['name'] = "sản phẩm 2";
        // $value[2]['price'] = "20000";
        // $value[2]['quantity'] = "1";
        // $value[2]['product_id'] = "3";

        $payment = $this->makePaymentUsingPayPalCart($product, 'USD', "$baseUrl&success=true",
            "$baseUrl&success=false");

        $tmpTransaction->order_id = $st;
        $tmpTransaction->payment_id = $payment->getId();
        $tmpTransaction->save();

        header("Location: " . $this->getLink($payment->getLinks(), "approval_url"));
        exit;
        return "index";
    }

    private function makePaymentUsingPayPalCart($order, $currency, $returnUrl=null, $cancelUrl=null){
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $array_item = array();

        $total = 0;

        foreach ($order as $cart) {

            $item = new Item();
            $item->setQuantity($cart['quantity']);
            $item->setName($cart['name']);
            $item->setPrice($cart['price']);
            $item->setCurrency($currency);
            $item->setSku($cart['product_id']);
            $array_item[] = $item;
            $total += (int)$cart['price'] * (int)$cart['quantity'];

      }
        $item_list = new ItemList();
        $item_list->setItems($array_item);

        $amount = new Amount();
        $amount->setCurrency($currency);
        $amount->setTotal((string)$total);

        //$amount->setTax()
        // ###Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        //$transaction->setDescription($order['description']);
        $transaction->setItemList($item_list);
     // $transaction->setPayee($payee);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($returnUrl);
        $redirectUrls->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setRedirectUrls($redirectUrls);
        $payment->setIntent("sale");
        $payment->setPayer($payer);

        $payment->setTransactions(array($transaction));

        $payment->create($this->getApiContext());
        return $payment;
    }

/*
    public function giaodich($product, $alias){

        //$input_price = 0;
        //$quantity = 1;
        $path = Request::path();
        $path = explode('/',$path);
        $link = '/'.$path[1].'/'.$path[2];

        if(Session::has('link')){
            Session::forget('link');
        }
        Session::put('link',$link);


        $data['input_price'] = $_POST['price'];
        //$data['quantity'] = $_POST['quantity'];

        if (isset($_POST['quantity'])){
            $data['quantity'] = Input::get('quantity');
            $data['total'] = Input::get('total');
        } else{
            $data['quantity'] = 1;
        }
        switch ($product){
            case 'merch':
                $this->giaodichMerch($alias, $data);
                break;
            case 'track':
                $this->giaodichTrack($alias, $data);
                break;
            case 'album':
                $this->giaodichAlbum($alias, $data);
                break;
        }
    }

    private function giaodichTrack($alias, $data){

        $track = Track::whereAlias($alias)->with('artist')->get()->first()->toArray();
        $path = Session::get('link');
        if($data['input_price'] < $track['price']){
            header("Location: " . URL::to($path));
            Session::flash('status', 'error');
            exit;
        }
            $tmpTransaction = new TmpTransaction;

            $data['description'] = $track['name'];
            $data['item_number'] = 'track-' . $track['id'];
            $data['email_paypal'] = $track['artist']['email_paypal'];
            $st = Str::random(16);

            $baseUrl = URL::to('/after_transaction?order_id=' . $st . '&product=track-'.$track['id']);

            $data['total'] = $data['input_price'] * $data['quantity'];
            $payment = $this->makePaymentUsingPayPal($data, 'JPY', "$baseUrl&success=true",
                "$baseUrl&success=false");

            $tmpTransaction->order_id = $st;
            $tmpTransaction->payment_id = $payment->getId();
            $tmpTransaction->item_id = "Track-" . $track['id'];
            $tmpTransaction->save();

            header("Location: " . $this->getLink($payment->getLinks(), "approval_url"));
            exit;
            return "index";
    }

    private function giaodichAlbum($alias, $data){

        $track = Album::whereAlias($alias)->with('artist')->get()->first()->toArray();
        $path = Session::get('link');
        if($data['input_price'] < $track['price']){
            header("Location: " . URL::to($path));
            Session::flash('status', 'error');
            exit;
        }

        $tmpTransaction = new TmpTransaction;

        $data['description'] = $track['name'];
        $data['item_number'] = 'album-' . $track['id'];
        $data['email_paypal'] = $track['artist']['email_paypal'];
        $st = Str::random(16);

        $baseUrl = URL::to('/after_transaction?order_id=' . $st . '&product=album-'.$track['id']);

        $data['total'] = $data['input_price'] * $data['quantity'];
        $payment = $this->makePaymentUsingPayPal($data, 'JPY', "$baseUrl&success=true",
            "$baseUrl&success=false");

        $tmpTransaction->order_id = $st;
        $tmpTransaction->payment_id = $payment->getId();
        $tmpTransaction->item_id = "album-" . $track['id'];
        $tmpTransaction->save();

        header("Location: " . $this->getLink($payment->getLinks(), "approval_url"));
        exit;
        return "index";
    }

    private function giaodichMerch($alias, $data){
        $path = Session::get('link');
       // return "index";

        $track = Merch::whereAlias($alias)->with('artist')->get()->first()->toArray();
        if($data['input_price'] < $track['price']){
            header("Location: " . URL::to($path));
            Session::flash('status', 'error');
            exit;
        }
        if($track['quantity'] > 0 && $data['quantity'] <= $track['quantity_remain'] && $data['quantity'] > 0 ){
            $json = file_get_contents('http://ipinfo.io/json'); // this WILL do an http request for you
            $locale = json_decode($json);
            $country = $locale->country;

            $data['price_ship']  = $data['total'] -($data['quantity'] * $data['input_price']) ;

            $tmpTransaction = new TmpTransaction;

            $data['description'] = $track['name'];
            $data['item_number'] = 'merch-' . $track['id'];
            $data['email_paypal'] = $track['artist']['email_paypal'];
            $st = Str::random(16);

            $baseUrl = URL::to('/after_transaction?order_id=' . $st . '&product=merch-'.$track['id']);
            $data['ship'] =
            //$data['total'] = $data['input_price'] * $data['quantity'];

            $payment = $this->makePaymentUsingPayPal($data, 'JPY', "$baseUrl&success=true",
                "$baseUrl&success=false");

            $tmpTransaction->order_id = $st;
            $tmpTransaction->payment_id = $payment->getId();
            $tmpTransaction->item_id = "merch-" . $track['id'];
            $tmpTransaction->save();

            header("Location: " . $this->getLink($payment->getLinks(), "approval_url"));
            exit;
            return "index";

        }else{
            header("Location: " . URL::to($path));
            Session::flash('status', 'error');
            exit;
        }
    }

    public function afterTransaction(){
        if ($_GET['success'] == 'false'){
            return Redirect::to(Session::get('link'));
        }else{
            $order_id = $_GET['order_id'];
            $tmpTransaction = TmpTransaction::whereOrderId($order_id)->get()->first()->
                toArray();

            $payment = $this->executePayment($tmpTransaction['payment_id'], $_GET['PayerID']);
            $tran = new Transaction();
            $tran->setTransactions($payment->getTransactions());
            $response = json_decode($payment->toJSON());
            $data['type'] = $_GET['product'];

            $home = HomeController::save_transaction($response,$data);

            if($home){
                Session::flash('status', 'error');
            }else{
                Session::flash('status', 'error');
            }
            $product = $_GET['product'];
            $product = explode('-',$product);
            $type = $product[0];
            $id_product = $product[1];
            Session::flash('status', 'success');
            $path;
            if($type =='track'){
                $track =  Track::whereId($id_product)->get()->first();
                $path = $track->alias;
                Session::flash('result', $track->toJson());

            }else if($type =='album'){
                 $track =  Album::whereId($id_product)->with('track')->get()->first();
                 $path = $track->alias;
                 Session::flash('result', $track->track->toJson());
            }else{
                $merch = Merch::whereId($id_product)->get()->first();
                $path = $merch->alias;
                Session::flash('product', 'merch');
            }
            return Redirect::to($type.'/'.$path);
        }
    }

    public function download($id){
      $track =   Track::whereId($id)->get()->first()->toArray();
      return Response::download($track['link_download'], Str::ascii($track['name']));
    }
    private function downloadAlbum($id){
        $album =  Album::whereId($id)->get()->first()->toArray();
        return $album;
    }
*/



    /**
     * Completes the payment once buyer approval has been
     * obtained. Used only when the payment method is 'paypal'
     *
     * @param string $paymentId id of a previously created
     * 		payment that has its payment method set to 'paypal'
     * 		and has been approved by the buyer.
     *
     * @param string $payerId PayerId as returned by PayPal post
     * 		buyer approval.
     */
    function executePayment($paymentId, $payerId){
        $payment = Payment::get($paymentId, $this->getApiContext());
        $paymentExecution = new PaymentExecution();
        $paymentExecution->setPayerId($payerId);
        $payment = $payment->execute($paymentExecution, $this->getApiContext());
        return $payment;
    }

    /**
     * [getApiContext description]
     * @return [type] [description]
     */
    function getApiContext(){
        $apiContext = new ApiContext(new OAuthTokenCredential('ATQrIRBU_S5dj3xYFQvDdlRYIqKL_mizSrhBgIftbgW57EQ7pv2N3gKubV-Z',
            'EHiNeBCH6KbBFfFIe4-rg5yMXAhBDRnjdVdnEvYOg4ooFc8b8au6qWlwlItY'));
        // Define the location of the sdk_config.ini file
        // define("PP_CONFIG_PATH", dirname('app/../'));
        // Alternatively pass in the configuration via a hashmap.
        // The hashmap can contain any key that is allowed in
        // sdk_config.ini
        $apiContext->setConfig(array(
            'http.ConnectionTimeOut' => 30,
            'http.Retry' => 1,
            'mode' => 'sandbox',
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'INFO'
        ));

        return $apiContext;
    }

    /**
     * [getLink description]
     * @param  array  $links [description]
     * @param  [type] $type  [description]
     * @return [type]        [description]
     */
    function getLink(array $links, $type){
        foreach ($links as $link){
            if ($link->getRel() == $type){
                return $link->getHref();
            }
        }
        return "";
    }

    /**
     * [makePaymentUsingPayPal description]
     * @param  [type] $order     [description]
     * @param  [type] $currency  [description]
     * @param  [type] $returnUrl [description]
     * @param  [type] $cancelUrl [description]
     * @return [type]            [description]
     */
    function makePaymentUsingPayPal($order, $currency, $returnUrl, $cancelUrl){

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
      //  $payee = new Payee();
      //  $payee->setEmail((string)$order['email_paypal']);
        // Specify the payment amount.
        $item = new Item();

        $item->setQuantity((string)$order['quantity']);
        $item->setName($order['description']);
        $item->setPrice((string )$order['input_price']);
        $item->setCurrency($currency);
        $item->setSku($order['item_number']);

        $array_item[] = $item;
        if(isset($order['price_ship'])){
            $item_ship = new Item();
            $item_ship->setQuantity('1');
            $item_ship->setName('shipping');
            $item_ship->setPrice((string )$order['price_ship']);
            $item_ship->setCurrency($currency);
            $item_ship->setSku('shipping');
            $array_item[] = $item_ship;
        }
        $item_list = new ItemList();
        $item_list->setItems($array_item);

        $amount = new Amount();
        $amount->setCurrency($currency);
        $amount->setTotal((string)$order['total']);

        //$amount->setTax()
        // ###Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($order['description']);
        $transaction->setItemList($item_list);
     // $transaction->setPayee($payee);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($returnUrl);
        $redirectUrls->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setRedirectUrls($redirectUrls);
        $payment->setIntent("sale");
        $payment->setPayer($payer);

        $payment->setTransactions(array($transaction));

        $payment->create($this->getApiContext());
        return $payment;
    }
}

?>