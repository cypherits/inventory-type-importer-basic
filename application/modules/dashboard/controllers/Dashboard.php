<?php

/**
 * Description of Dashboard
 *
 * @author Azim
 */
class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (!is_logged_in()) {
            redirect('auth');
        }
        $this->load->model('dashboard_model', 'dm');
    }

    public function index() {
        $this->load->view('dashboard/home', ['page_title' => 'Home', 'title' => 'home']);
    }

    public function create_invoice() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_invoice');
            }
        }else{
            $data = $this->dm->create_invoice();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_invoice');
            }
        }
    }

    public function list_invoice() {
        $this->load->view('dashboard/list_invoice');
    }

    public function getAllInvoice() {
        $data['data'] = $this->dm->getAllInvoice();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function invoice($invoice_id) {
        $data = $this->dm->invoice($invoice_id);
        $this->load->view('dashboard/invoice', $data);
    }
    

    public function create_orders() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_orders');
            }
        }else{
            $data = $this->dm->create_orders();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_orders');
            }
        }
    }
    
    public function password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/password');
            }
        }else{
            $this->db->where('id', 1)->update('users', ['password' => md5($this->input->post('password'))]);
            $data['rs'] = 1;
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/password');
            }
        }
    }

    public function list_orders() {
        $this->load->view('dashboard/list_orders');
    }

    public function getAllOrders() {
        $data['data'] = $this->dm->getAllOrders();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function orders($id) {
        $data = $this->dm->orders($id);
        $this->load->view('dashboard/orders', $data);
    }

    public function create_bills() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_bills');
            }
        }else{
            $data = $this->dm->create_bills();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_bills');
            }
        }
    }

    public function list_bills() {
        $this->load->view('dashboard/list_bills');
    }

    public function getAllbills() {
        $data['data'] = $this->dm->getAllbills();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function bills($id) {
        $data = $this->dm->bills($id);
        $this->load->view('dashboard/bills', $data);
    }

    public function create_money_receipt() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_money_receipt');
            }
        }else{
            $data = $this->dm->create_money_receipt();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_money_receipt');
            }
        }
    }

    public function list_money_receipt() {
        $this->load->view('dashboard/list_money_receipt');
    }

    public function getAllMoneyReceipt() {
        $data['data'] = $this->dm->getAllMoneyReceipt();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function money_receipt($id) {
        $data = $this->dm->money_receipt($id);
        $this->load->view('dashboard/money_receipt', $data);
    }

    public function create_delivery_challan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_delivery_challan');
            }
        }else{
            $data = $this->dm->create_delivery_challan();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_delivery_challan');
            }
        }
    }

    public function list_delivery_challan() {
        $this->load->view('dashboard/list_delivery_challan');
    }

    public function getAllDeliveryChallan() {
        $data['data'] = $this->dm->getAllDeliveryChallan();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function delivery_challan($id) {
        $data = $this->dm->delivery_challan($id);
        $this->load->view('dashboard/delivery_challan', $data);
    }

    public function create_products() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name', 'New Password', 'required');
        $this->form_validation->set_rules('size', 'Old Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 0;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_products');
            }
        }else{
            $data = $this->dm->create_products();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_products');
            }
        }
    }

    public function list_products() {
        $this->load->view('dashboard/list_products');
    }

    public function getAllProducts() {
        $data['data'] = $this->dm->getAllProducts();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function create_inventory() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('products_id', 'New Password', 'required');
        $this->form_validation->set_rules('import_invoice_ref', 'Old Password', 'required');
        $this->form_validation->set_rules('per_crtn', 'New Password', 'required');
        $this->form_validation->set_rules('crtn_qty', 'Old Password', 'required');
        $this->form_validation->set_rules('qty', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 5;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_inventory');
            }
        }else{
            $data = $this->dm->create_inventory();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_inventory');
            }
        }
    }

    public function list_inventory() {
        $this->load->view('dashboard/list_inventory');
    }

    public function getAllInventory() {
        $data['data'] = $this->dm->getAllInventory();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function create_import_expense() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('products_id', 'New Password', 'required');
        if($this->form_validation->run() == FALSE){
            if($this->input->is_ajax_request()){
                $data['rs'] = 5;
                $data['fields'] = get_error_fields();
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_import_expense');
            }
        }else{
            $data = $this->dm->create_import_expense();
            if($this->input->is_ajax_request()){
                header('Content-Type: Application/json');
                echo json_encode($data);
            }
            else{
                $this->load->view('dashboard/create_import_expense');
            }
        }
    }

    public function list_import_expense() {
        $this->load->view('dashboard/list_import_expense');
    }

    public function getAllImportExpense() {
        $data['data'] = $this->dm->getAllImportExpense();
        header("Content-Type: Application/json");
        echo json_encode($data);
    }

    public function import_expense($id) {
        $data = $this->dm->import_expense($id);
        $this->load->view('dashboard/import_expense', $data);
    }

    public function profit_loss() {
        $this->load->view('dashboard/profit_loss');
    }

    public function get_profit_loss() {
        $data = $this->dm->get_profit_loss();
        $this->load->view('dashboard/get_profit_loss', $data);
    }
    
    public function menu_sale(){
        $this->load->view('dashboard/menu_sale', ['page_title' => 'Home', 'title' => 'home']);
    }
    public function menu_inventory(){
        $this->load->view('dashboard/menu_inventory', ['page_title' => 'Home', 'title' => 'home']);
    }
    public function menu_accounts(){
        $this->load->view('dashboard/menu_accounts', ['page_title' => 'Home', 'title' => 'home']);
    }
    
    public function delete($table, $id){
        if($table == 'invoice'){
            $this->db->where('invoice_id', $id)->delete($table);
            $this->db->where('invoice_id', $id)->delete('stocks');
            $this->db->where('invoice_id', $id)->delete('accounts');
            $this->db->where('invoice_id', $id)->delete('invoice_items');
        }else{
            $this->db->where('id', $id)->delete($table);
        
            if ($table == 'inventory_tabls') {
                $this->db->where('inventory_id', $id)->delete('stocks');
            }
            
            if ($table == 'import_voucher') {
                $this->db->where('import_voucher_id', $id)->delete('accounts');
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}
