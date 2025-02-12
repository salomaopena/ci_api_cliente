<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model
{
    private function get($endpoint, $method = 'GET', $postData = [])
    {

        $postData = json_encode($postData);
        $credencials = [
            'project_id'    => PROJECT_ID,
            'api_key'       => API_KEY,
        ];

        $credencials = json_encode($credencials);
        $credencials = bin2hex(service('encrypter')->encrypt($credencials));

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => API_BASE_URL . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "cache-control: no-cache",
                "X-API-CREDENCIALS: " . $credencials
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return [
                'status' => 'error',
                'message' => $err
            ];
        } else {
            return [
                'status' => 'OK',
                'message' => 'success',
                'data' => json_decode($response, true)
            ];
        }
    }

    public function get_status()
    {
        return $this->get('status');
    }

    public function get_all_products()
    {
        return $this->get('all_products');
    }

    public function get_product($id)
    {
        $postData = ['id' => $id];
        return $this->get('product', 'POST', $postData);
    }

    public function get_all_categories()
    {
        return $this->get('all_categories');
    }

    public function get_product_from_category($category)
    {
        $postData = ['category' => $category];
        return $this->get('all_product_by_category', 'POST', $postData);
    }

    public function get_products_with_stock($min_stock, $max_stock)
    {
        $postData = [
            'min' => $min_stock,
            'max' => $max_stock,
        ];
        return $this->get('all_product_with_stock_between', 'POST', $postData);
    }

    public function add_product($new_product){
        return $this->get('add_product', 'POST', $new_product);
    }

    public function update_product($updated_product){
        return $this->get('update_product', 'PUT', $updated_product);
    }

    public function delete_product($delete_product){
        $postData = ['id' => $delete_product];
        return $this->get('delete_product', 'DELETE', $postData);
    }
}
