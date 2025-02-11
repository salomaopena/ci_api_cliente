<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApiModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;

class Main extends BaseController
{
    public function index()
    {
        echo 'Teste de API';
    }

    public function status()
    {
        $api =  new ApiModel();
        $results = $api->get_status();
        dd($results);
    }

    public function all_products(){
        $api =  new ApiModel();
        $results = $api->get_all_products();
        dd($results);
    }

    public function product($id){
        $api =  new ApiModel();
        $results = $api->get_product($id);
        dd($results);
    }

    public function all_categories(){
        $api =  new ApiModel();
        $results = $api->get_all_categories();
        dd($results);
    }

    public function products_from_category($category){
        $api =  new ApiModel();
        $results = $api->get_product_from_category($category);
        dd($results);
    }

    public function products_with_stock($min_stock, $max_stock){
        $api =  new ApiModel();
        $results = $api->get_products_with_stock($min_stock, $max_stock);
        dd($results);
    }
}
