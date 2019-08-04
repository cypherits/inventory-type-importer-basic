<?php

/**
 * Description of Dashboard_model
 *
 * @author Azim
 */
class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create_products() {
        $set = [
            'product_name' => $this->input->post('product_name'),
            'size' => $this->input->post('size'),
        ];
        $this->db->insert('products', $set);
        if ($this->db->insert_id() > 0) {
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 0;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }

    public function create_import_expense() {
        $set = [
            'products_id' => $this->input->post('products_id'),
            'qty' => $this->input->post('qty'),
            'lc_opening_payment_to_bank' => $this->input->post('lc_opening_payment_to_bank'),
            'bank_charges' => $this->input->post('bank_charges'),
            'payment_to_exporter' => $this->input->post('payment_to_exporter'),
            'customs_duty' => $this->input->post('customs_duty'),
            'others_payment' => $this->input->post('others_payment'),
            'cnf_bill' => $this->input->post('cnf_bill'),
            'transportation_fare' => $this->input->post('transportation_fare'),
            'others_cost' => $this->input->post('others_cost'),
            'total_expense' => $this->input->post('total_expense'),
            'unit_cost' => $this->input->post('unit_cost'),
        ];
        $this->db->insert('import_voucher', $set);
        $voucher_id = $this->db->insert_id();
        $set = [
                'users_id' => 1,
                'particular' => 'purchase',
                'import_voucher_id' => $voucher_id,
                'credit' => $this->input->post('total_expense'),
            ];
            $this->db->insert('accounts', $set);
        if ($voucher_id > 0) {
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 0;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }

    public function create_inventory() {
        $set = [
            'users_id' => 1,
            'products_id' => $this->input->post('products_id'),
            'import_invoice_ref' => $this->input->post('import_invoice_ref'),
            'per_crtn' => $this->input->post('per_crtn'),
            'crtn_qty' => $this->input->post('crtn_qty'),
            'qty' => $this->input->post('qty'),
            'remark' => $this->input->post('remark'),
        ];
        $this->db->insert('inventory_tabls', $set);
        $inventory_id = $this->db->insert_id();
        if ($inventory_id > 0) {
            $set = [
                'users_id' => 1,
                'products_id' => $this->input->post('products_id'),
                'inventory_id' => $inventory_id,
                'per_crtn' => $this->input->post('per_crtn'),
                'crtn_qty' => $this->input->post('crtn_qty'),
                'qty' => $this->input->post('qty'),
                'type' => 'dr',
            ];
            $this->db->insert('stocks', $set);
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 6;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }
    
    public function create_invoice() {
        $invoice_id = genarate_invoice_id();
        $set = [
            'users_id' => 1,
            'invoice_id' => $invoice_id,
            'customer_name' => $this->input->post('customer_name'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'order_no' => $this->input->post('order_no'),
            'vat_reg_no' => $this->input->post('vat_reg_no'),
            'transport_method' => $this->input->post('transport_method'),
            'driver_name' => $this->input->post('driver_name'),
            'executive_name' => $this->input->post('executive_name'),
            'total_ammount' => $this->input->post('total_ammount'),
        ];
        $this->db->insert('invoice', $set);
        if ($this->db->insert_id() > 0) {
            foreach ($this->input->post('products_id') as $key => $val){
                $set = [
                    'users_id' => 1,
                    'products_id' => $this->input->post('products_id')[$key],
                    'invoice_id' => $invoice_id,
                    'per_crtn' => $this->input->post('per_crtn')[$key],
                    'crtn_qty' => $this->input->post('crtn_qty')[$key],
                    'qty' => $this->input->post('qty')[$key],
                    'type' => 'cr',
                ];
                $this->db->insert('stocks', $set);
                $set = [
                    'users_id' => 1,
                    'invoice_id' => $invoice_id,
                    'products_id' => $this->input->post('products_id')[$key],
                    'per_crtn' => $this->input->post('per_crtn')[$key],
                    'crtn_qty' => $this->input->post('crtn_qty')[$key],
                    'qty' => $this->input->post('qty')[$key],
                    'unit_price' => $this->input->post('unit_price')[$key],
                    'crtn_price' => $this->input->post('crtn_price')[$key],
                    'total_price' => $this->input->post('total_price')[$key],
                ];
                $this->db->insert('invoice_items', $set);
            }
            $set = [
                'users_id' => 1,
                'particular' => 'sale',
                'invoice_id' => $invoice_id,
                'debit' => $this->input->post('total_ammount'),
            ];
            $this->db->insert('accounts', $set);
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 6;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }
    
    public function create_bills() {
        $set = [
            'users_id' => 1,
            'customer_name' => $this->input->post('customer_name'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'order_no' => $this->input->post('order_no'),
            'vat_reg_no' => $this->input->post('vat_reg_no'),
            'reference' => $this->input->post('reference'),
            'total_sale' => $this->input->post('total_sale'),
            'discount' => $this->input->post('discount'),
            'total_ammount' => $this->input->post('total_ammount'),
            'remarks' => $this->input->post('remarks'),
        ];
        $this->db->insert('bills', $set);
        $bills_id = $this->db->insert_id();
        if ($bills_id > 0) {
            foreach ($this->input->post('products_id') as $key => $val){
                $set = [
                    'users_id' => 1,
                    'bills_id' => $bills_id,
                    'products_id' => $this->input->post('products_id')[$key],
                    'per_crtn' => $this->input->post('per_crtn')[$key],
                    'crtn_qty' => $this->input->post('crtn_qty')[$key],
                    'qty' => $this->input->post('qty')[$key],
                    'unit_price' => $this->input->post('unit_price')[$key],
                    'crtn_price' => $this->input->post('crtn_price')[$key],
                    'total_price' => $this->input->post('total_price')[$key],
                ];
                $this->db->insert('bills_items', $set);
            }
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 6;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }
    
    public function create_orders() {
        $set = [
            'users_id' => 1,
            'customer_name' => $this->input->post('customer_name'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'reference' => $this->input->post('reference'),
            'date_of_visit' => $this->input->post('date_of_visit'),
            'payment_type' => $this->input->post('payment_type'),
            'bank_name' => $this->input->post('bank_name'),
            'chq_no' => $this->input->post('chq_no'),
            'chq_ammount' => $this->input->post('chq_ammount'),
            'total_ammount' => $this->input->post('total_ammount'),
        ];
        $this->db->insert('orders', $set);
        $order_id = $this->db->insert_id();
        if ($order_id > 0) {
            foreach ($this->input->post('products_id') as $key => $val){
                $set = [
                    'users_id' => 1,
                    'orders_id' => $order_id,
                    'products_id' => $this->input->post('products_id')[$key],
                    'qty' => $this->input->post('qty')[$key],
                    'rate' => $this->input->post('rate')[$key],
                    'total_rate' => $this->input->post('total_rate')[$key],
                ];
                $this->db->insert('orders_items', $set);
            }
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 6;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }
    
    public function create_delivery_challan() {
        $set = [
            'users_id' => 1,
            'customer_name' => $this->input->post('customer_name'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'vat_reg_no' => $this->input->post('vat_reg_no'),
            'transport_type' => $this->input->post('transport_type'),
            'driver_name' => $this->input->post('driver_name'),
            'driver_contact' => $this->input->post('driver_contact'),
            'delivery_date' => $this->input->post('delivery_date'),
            'remark' => $this->input->post('remark'),
        ];
        $this->db->insert('delivery_challan', $set);
        $delivery_challan_id = $this->db->insert_id();
        if ($delivery_challan_id > 0) {
            foreach ($this->input->post('products_id') as $key => $val){
                $set = [
                    'users_id' => 1,
                    'delivery_challan_id' => $delivery_challan_id,
                    'products_id' => $this->input->post('products_id')[$key],
                    'per_crtn' => $this->input->post('per_crtn')[$key],
                    'crtn_qty' => $this->input->post('crtn_qty')[$key],
                    'qty' => $this->input->post('qty')[$key],
                ];
                $this->db->insert('delivery_challan_items', $set);
            }
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 6;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }
    
    public function create_money_receipt() {
        $set = [
            'users_id' => 1,
            'customer_name' => $this->input->post('customer_name'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'reference' => $this->input->post('reference'),
            'order_no' => $this->input->post('order_no'),
            'order_date' => $this->input->post('order_date'),
            'payment_type' => $this->input->post('payment_type'),
            'bank_name' => $this->input->post('bank_name'),
            'chq_no' => $this->input->post('chq_no'),
            'chq_ammount' => $this->input->post('chq_ammount'),
            'total' => $this->input->post('total'),
            'remark' => $this->input->post('remark'),
            'in_words' => $this->input->post('in_words'),
            'paid' => $this->input->post('paid'),
            'due' => $this->input->post('due'),
        ];
        $this->db->insert('money_receipt', $set);
        $delivery_challan_id = $this->db->insert_id();
        if ($delivery_challan_id > 0) {
            foreach ($this->input->post('particular') as $key => $val){
                $set = [
                    'users_id' => 1,
                    'money_receipt_id' => $delivery_challan_id,
                    'particular' => $this->input->post('particular')[$key],
                    'ammount' => $this->input->post('ammount')[$key],
                    'remark' => $this->input->post('remarks')[$key],
                ];
                $this->db->insert('money_receipt_items', $set);
            }
            $data['rs'] = 1;
            $data['fields'] = 'Password Updated Successfully.';
        } else {
            $data['rs'] = 6;
            $data['fields'] = ['product_name', 'size'];
        }
        return $data;
    }
    
    public function getAllInventory() {
        
        $sql = $this->db->get('inventory_tabls');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    get_product_by_id($row->products_id)['product_name'],
                    get_product_by_id($row->products_id)['size'],
                    $row->import_invoice_ref,
                    $row->per_crtn,
                    $row->crtn_qty,
                    $row->qty,
                    date('d M Y', strtotime($row->created_at)),
                    $row->remark,
                    '<a href="'. base_url('dashboard/delete/inventory_tabls/'.$row->id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    public function getAllInvoice() {
        
        $sql = $this->db->order_by('id', 'DESC')->get('invoice');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    '<a href="'. base_url('dashboard/invoice/'.$row->invoice_id).'">'.$row->invoice_id.'</a>',
                    
                    $row->customer_name,
                    $row->contact,
                    $row->order_no,
                    $row->transport_method,
                    $row->driver_name,
                    $row->executive_name,
                    $row->total_ammount,
                    date('d M Y', strtotime($row->created_at)),
                    '<a href="'. base_url('dashboard/invoice/'.$row->invoice_id).'">Details</a> '.'<a href="'. base_url('dashboard/delete/invoice/'.$row->invoice_id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    public function getAllBills() {
        
        $sql = $this->db->order_by('id', 'DESC')->get('bills');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    $row->customer_name,
                    $row->contact,
                    $row->order_no,
                    $row->reference,
                    $row->total_sale,
                    $row->discount,
                    $row->total_ammount,
                    date('d M Y', strtotime($row->created_at)),
                    '<a href="'. base_url('dashboard/bills/'.$row->id).'">Details</a> '.'<a href="'. base_url('dashboard/delete/bills/'.$row->id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    
    public function getAllImportExpense() {
        
        $sql = $this->db->order_by('id', 'DESC')->get('import_voucher');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    get_product_by_id($row->products_id)['product_name'],
                    $row->qty,
                    $row->total_expense,
                    $row->unit_cost,
                    date('d M Y', strtotime($row->created_at)),
                    '<a href="'. base_url('dashboard/import_expense/'.$row->id).'">Details</a> '.'<a href="'. base_url('dashboard/delete/import_voucher/'.$row->id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    public function getAllMoneyReceipt() {
        
        $sql = $this->db->order_by('id', 'DESC')->get('money_receipt');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    $row->customer_name,
                    $row->contact,
                    $row->order_no,
                    $row->reference,
                    $row->total,
                    $row->remark,
                    date('d M Y', strtotime($row->created_at)),
                    '<a href="'. base_url('dashboard/money_receipt/'.$row->id).'">Details</a> '.'<a href="'. base_url('dashboard/delete/money_receipt/'.$row->id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    public function getAllOrders() {
        
        $sql = $this->db->order_by('id', 'DESC')->get('orders');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    $row->customer_name,
                    $row->contact,
                    $row->reference,
                    date('d M Y', strtotime($row->date_of_visit)),
                    $row->bank_name,
                    date('d M Y', strtotime($row->created_at)),
                    '<a href="'. base_url('dashboard/orders/'.$row->id).'">Details</a> '.'<a href="'. base_url('dashboard/delete/orders/'.$row->id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    public function getAllDeliveryChallan() {
        
        $sql = $this->db->order_by('id', 'DESC')->get('delivery_challan');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    $row->customer_name,
                    $row->contact,
                    $row->driver_name,
                    $row->driver_contact,
                    date('d M Y', strtotime($row->delivery_date)),
                    '<a href="'. base_url('dashboard/delivery_challan/'.$row->id).'">Details</a> '.'<a href="'. base_url('dashboard/delete/delivery_challan/'.$row->id).'" class="text-danger"><i class="fa fa-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
    
    public function getAllProducts() {
        $sql = $this->db->get('products');
        $data = [];
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = [
                    $row->product_name,
                    $row->size,
                    get_product_stock_by_id($row->id)
                ];
            }
        }
        return $data;
    }
    
    public function invoice($invoice_id){
        $sql = $this->db->where('invoice_id', $invoice_id)->get('invoice');
        if($sql->num_rows() > 0){
            $invoice = $sql->row_array();
            $sql = $this->db->where('invoice_id', $invoice_id)->get('invoice_items');
            if($sql->num_rows() > 0){
                $invoice['items'] = $sql->result();
                return $invoice;
            } else {
                show_404();
                die();
            }
        }else{
            show_404();
            die();
        }
    }
    
    public function orders($id){
        $sql = $this->db->where('id', $id)->get('orders');
        if($sql->num_rows() > 0){
            $orders = $sql->row_array();
            $sql = $this->db->where('orders_id', $id)->get('orders_items');
            if($sql->num_rows() > 0){
                $orders['items'] = $sql->result();
                return $orders;
            } else {
                show_404();
                die();
            }
        }else{
            show_404();
            die();
        }
    }
    
    public function money_receipt($id){
        $sql = $this->db->where('id', $id)->get('money_receipt');
        if($sql->num_rows() > 0){
            $orders = $sql->row_array();
            $sql = $this->db->where('money_receipt_id', $id)->get('money_receipt_items');
            if($sql->num_rows() > 0){
                $orders['items'] = $sql->result();
                return $orders;
            } else {
                show_404();
                die();
            }
        }else{
            show_404();
            die();
        }
    }
    
    
    public function delivery_challan($id){
        $sql = $this->db->where('id', $id)->get('delivery_challan');
        if($sql->num_rows() > 0){
            $orders = $sql->row_array();
            $sql = $this->db->where('delivery_challan_id', $id)->get('delivery_challan_items');
            if($sql->num_rows() > 0){
                $orders['items'] = $sql->result();
                return $orders;
            } else {
                show_404();
                die();
            }
        }else{
            show_404();
            die();
        }
    }
    
    public function bills($id){
        $sql = $this->db->where('id', $id)->get('bills');
        if($sql->num_rows() > 0){
            $invoice = $sql->row_array();
            $sql = $this->db->where('bills_id', $id)->get('bills_items');
            if($sql->num_rows() > 0){
                $invoice['items'] = $sql->result();
                return $invoice;
            } else {
                show_404();
                die();
            }
        }else{
            show_404();
            die();
        }
    }
    
    public function import_expense($id){
        $sql = $this->db->where('id', $id)->get('import_voucher');
        if($sql->num_rows() > 0){
            $invoice = $sql->row_array();
            return $invoice;
        }else{
            show_404();
            die();
        }
    }
    
    public function get_profit_loss(){
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        
        if($month != null && $year != null){
            $this->db->where('MONTH(created_at)', $month);
            $this->db->where('YEAR(created_at)', $year);
        }else if($month != null){
            $this->db->where('MONTH(created_at)', $month);
            $this->db->where('YEAR(created_at)', date('Y'));
        }else if($year != null){
            $this->db->where('YEAR(created_at)', $year);
        }
        $total = 0;
        $dr = 0;
        $cr = 0;
        $sql = $this->db->get('accounts');
        $result = $sql->result();
        foreach ($result as $row){
            $dr += $row->debit;
            $total += $row->debit;
            $cr += $row->credit;
            $total -= $row->credit;
        }
        
//        $products = get_product_array_select();
//        $pr = [];
//        foreach ($products as $id => $name){
//            if($month != null && $year != null){
//                $this->db->where('MONTH(created_at)', $month);
//                $this->db->where('YEAR(created_at)', $year);
//            }else if($month != null){
//                $this->db->where('MONTH(created_at)', $month);
//                $this->db->where('YEAR(created_at)', date('Y'));
//            }else if($year != null){
//                $this->db->where('YEAR(created_at)', $year);
//            }
//            $set = [
//                'name' => $name,
//                'stock_in' => 0,
//                'stock_out' => 0,
//                'expense' => 0,
//                'income' => 0,
//                'unit_cost' => 0
//            ];
//            $sql = $this->db->where('products_id', $id)->get('import_voucher');
//            foreach ($sql->result() as $row){
//                $set['expense'] +=  $row->total_expense;
//                $set['unit_cost'] +=  $row->unit_cost;
//            }
//        }
        $return = ['income' => $dr, 'expense' => $cr, 'profit' => $total, 'balance_sheet' => $result];
        return $return;
    }
}
