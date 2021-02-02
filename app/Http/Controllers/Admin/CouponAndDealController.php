<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Contracts\CouponAndDealContract;
use App\Http\Controllers\BaseController;

class CouponAndDealController extends BaseController
{
    /**
     * @var CouponAndDealContract
     */
    protected $couponAndDealRepository;
    
    public function __construct(CouponAndDealContract $couponAndDealRepository)
    {   
        $this->couponAndDealRepository = $couponAndDealRepository;
    }

    
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $couponAndDeals = $this->couponAndDealRepository->listCouponAndDeals();
        $this->setPageTitle('CouponAndDeals', 'List of all CouponAndDeals');
        return view('admin.couponAndDeals.index', compact('couponAndDeals'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $products  = Product::where('status',1)->get();
        $categories = Category::where('menu',1)->get();     
        $this->setPageTitle('couponAndDeals', 'Create couponAndDeal');
        return view('admin.couponAndDeals.create',compact('categories','products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $couponDeal_rules = [];
        $exclude_from_request = [];
        // rules specific to coupon or deals 
        if( $request->type == 'coupon')
        {
            $couponDeal_rules = ['code' => 'required' , 'quantity' => 'required'];
            $exclude_from_request[] = 'banner';

        }elseif($request->type == 'deal')
        {
            $couponDeal_rules=[];
            $exclude_from_request[] = 'code';
            $exclude_from_request[] = 'quantity';
        }
        

        $rules = [];
        // rules specific to deal or coupon type
        if( $request->apply_at ==  'product' )
        {
            $rules = [ 'products' => 'required'];
            $exclude_from_request[] = 'categories';
        }
        elseif( $request->apply_at == 'category' )
        {     
            $rules = ['categories' => 'required'];
            $exclude_from_request[] = 'products';
        }
        elseif( $request->apply_at == 'cart' )
        {    
            $rules = [
                     'min_cart_limit' => 'required|numeric'
            ];
            $exclude_from_request[] = 'categories' ;
            $exclude_from_request[] = 'products';
        }
   
        
        $rules  = array_merge($rules , $couponDeal_rules); 
        $rules  = array_merge(    
            $rules , [  'type'          =>  'required|max:191',
                        'title'         =>  'required|max:191',
                        'discount_type' =>  'required|max:191',
                        'value'         =>  'required|integer',
                        'banner'        =>  'mimes:jpg,jpeg,png|max:1000',
                        'expire_at'     =>  'required']
        );

        $this->validate($request, $rules );

        $exclude_from_request[] = '_token'; 
        $params = $request->except($exclude_from_request);

        $couponAndDeal = $this->couponAndDealRepository->createCouponAndDeal($params);

        if ( !$couponAndDeal ) {
            return $this->responseRedirectBack('Error occurred while creating couponAndDeal.', 'error', true, true);
        }
        return $this->responseRedirect('admin.couponAndDeals.index', 'couponAndDeal added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {   

        $products  = Product::where('status',1)->get();
        $categories = Category::where('menu',1)->get();


        $couponAndDeal = $this->couponAndDealRepository->findCouponAndDealById($id);

        $this->setPageTitle('couponAndDeals', 'Edit couponAndDeal : '.$couponAndDeal->title);
        return view('admin.couponAndDeals.edit', compact('couponAndDeal','products','categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $couponDeal_rules = [];
        $exclude_from_request = [];
        // rules specific to coupon or deals 
        if( $request->type == 'coupon')
        {
            $couponDeal_rules = ['code' => 'required' , 'qauntity' => 'requried'];
            $exclude_from_request[] = 'banner';

        }elseif($request->type == 'deal')
        {
            $couponDeal_rules=[];
            $exclude_from_request[] = 'code';
        }
        

        $rules = [];
        // rules specific to deal or coupon type
        if( $request->apply_at ==  'product' )
        {
            $rules = [ 'products' => 'required'];
            $exclude_from_request[] = 'categories';
        }
        elseif( $request->apply_at == 'category' )
        {     
            $rules = ['categories' => 'required'];
            $exclude_from_request[] = 'products';
        }
        elseif( $request->apply_at == 'cart' )
        {    
            $rules = [
                     'min_cart_limit' => 'required|numeric'
            ];
            $exclude_from_request[] = 'categories' ;
            $exclude_from_request[] = 'products';
        }
   
        
        $rules  = array_merge($rules , $couponDeal_rules); 
        $rules  = array_merge(    
            $rules , [  'type'          =>  'required|max:191',
                        'title'         =>  'required|max:191',
                        'discount_type' =>  'required|max:191',
                        'value'         =>  'required|numeric',
                        'banner'        =>  'mimes:jpg,jpeg,png|max:1000',
                        'expire_at'     =>  'required',
                        'apply_at'      =>  'required'
                        ]
        );

        $this->validate($request, $rules );

        $exclude_from_request[] = '_token'; 

        $params = $request->except($exclude_from_request);

        $couponAndDeal = $this->couponAndDealRepository->updateCouponAndDeal($params);



        if (!$couponAndDeal) {
            return $this->responseRedirectBack('Error occurred while updating couponAndDeal.', 'error', true, true);
        }
        return $this->responseRedirectBack('couponAndDeal updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $couponAndDeal = $this->couponAndDealRepository->deletecouponAndDeal($id);

        if (!$couponAndDeal) {
            return $this->responseRedirectBack('Error occurred while deleting couponAndDeal.', 'error', true, true);
        }
        return $this->responseRedirect('admin.couponAndDeals.index', 'couponAndDeal deleted successfully' ,'success',false, false);
    }


}
