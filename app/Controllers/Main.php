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

    public function add_product(){
        // Implementar a lógica para adicionar um novo produto
        // Retornar um response com o status da adição
        $new_product = [
            'product_name' => 'Novo Produto',
            'category' => 'Descrição do novo produto',
            'price_per_unit' => 19.99,
            'stock' => 100,
            'created_at' => date('Y-m-d H:i:s') // ID da categoria do novo produto
        ];

        $api =  new ApiModel();
        $results = $api->add_product($new_product);
        dd($results);
    }

    public function update_product($id){
        // Implementar a lógica para atualizar um produto
        // Retornar um response com o status da atualização
        $updated_product = [
            'id' => $id, // ID do produto a ser atualizado
            'product_name' => 'Atualizado Produto',
            'category' => 'Descrição do novo produto',
            'price_per_unit' => 29.99,
            'stock' => 50,
            'updated_at' => date('Y-m-d H:i:s') // ID da categoria do atualizado produto
        ];

        $api =  new ApiModel();
        $results = $api->update_product($updated_product);
        dd($results);
    }

    public function delete_product($id){
        $api =  new ApiModel();
        $results = $api->delete_product($id);
        dd($results);
    }
    
}
