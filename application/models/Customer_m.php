<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customer_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['addr']
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'updated ' => date('Y-m-d  H:i:s')
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }

    public function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }

    public function index($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $params = [
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'created ' => date('Y-m-d  H:i:s')
        ];
        $this->db->insert('customer', $params);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $sale = [
                'customer_id' => $id_invoice,
                'total_price' => $item['price'] * $item['qty'],
                'discount' => 0,
                'final_price' => ($item['price'] * $item['qty']),
                'cash' => $item['price'] * $item['qty']
            ];
            $this->db->insert('t_sale', $sale);
            $cart = [
                // 'customer_id' => $id_invoice,
                'sale_id' => $this->db->insert_id(),
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
            ];
            $this->db->insert('t_sale_detail', $cart);
        }
        return true;
    }
}
