<?php

namespace App\Repositories;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $orderArray = [];

        $order_basic = [
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>  auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,

            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address1'          =>  $params['address1'],
            'address2'          =>  $params['address2'],
            'city'              =>  $params['city'],
            'state'             =>  $params['state'],
            'country'           =>  $params['country'],
            'zipcode'           =>  $params['zipcode'],
            'phone_number'      =>  $params['phone_number'],                 
            'notes'             =>  $params['notes']
        ];        

        if( isset( $params['different_billing_address'] ) ){
             $billing_details = [ 
                'bill_first_name'        =>  $params['bill_first_name'],
                'bill_last_name'         =>  $params['bill_last_name'],
                'bill_address1'          =>  $params['bill_address1'],
                'bill_address2'          =>  $params['bill_address2'],
                'bill_city'              =>  $params['bill_city'],
                'bill_state'             =>  $params['bill_state'],
                'bill_country'           =>  $params['bill_country'],
                'bill_zipcode'           =>  $params['bill_zipcode'],

            ];
        }else{
              $billing_details = [
                'bill_first_name'        =>  $params['first_name'],
                'bill_last_name'         =>  $params['last_name'],
                'bill_address1'          =>  $params['address1'],
                'bill_address2'          =>  $params['address2'],
                'bill_city'              =>  $params['city'],
                'bill_state'             =>  $params['state'],
                'bill_country'           =>  $params['country'],
                'bill_zipcode'           =>  $params['zipcode']
            ];
        }  


        $orderDetails = array_merge( $order_basic , $billing_details );
        $order = Order::create( $orderDetails );


        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceWithConditions()
                ]);

                $order->items()->save($orderItem);
            }
        
        }

        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }
}
