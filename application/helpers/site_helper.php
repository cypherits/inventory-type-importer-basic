<?php

if (!function_exists('is_logged_in')) {

    function is_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('users_info') == NULL) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

if (!function_exists('get_user_name_by_id')) {

    function get_user_name_by_id($id) {
        $ci = & get_instance();
        $sql = $ci->db->where('id', $id)->select(['first_name', 'last_name'])->get('users');
        if ($sql->num_rows() == 1) {
            return $sql->row_array()['first_name'] . ' ' . $sql->row_array()['last_name'];
        } else {
            return '';
        }
    }

}
if (!function_exists('get_error_fields')) {

    function get_error_fields() {
        $data = [];
        foreach ($_POST as $key => $val) {
            if (form_error($key) != '') {
                $data[] = $key;
            }
        }
        return $data;
    }

}
if (!function_exists('create_dashboard_input')) {

    function create_dashboard_input($name, $title, $type = 'text', $required = false, $error = '', $val_type = false, $options = [], $pr_id = '', $place_holder = '') {
        $attr_type = 'type="' . $type . '"';
        $attr_name = 'name="' . $name . '"';
        $attr_id = 'id="input_' . $name . '"';
        $att_class = (form_error($name) != '') ? 'class="form-control invalid"' : 'class="form-control"';
        $attr_placeholder = 'placeholder="' . $title . '"';
        $attr_value = 'value="' . set_value($name) . '"';
        $attr_data_required = ($required) ? 'data-required="true"' : '';
        $attr_data_val_type = (!$val_type) ? '' : 'data-val_type="' . $val_type . '"';
        $display_style = (form_error($name) != '') ? 'style="display:block"' : '';
        $steps = ($type == 'number')?'step=".01"':'';
        $html = '<div class="form-group row" id="' . $pr_id . '">
                    <label for="input_' . $name . '" class="col-12 col-form-label">' . $title . '</label>
                    <div class="col-12">
                        <input ' . $attr_type . ' ' . $attr_name . ' ' . $attr_id . ' ' . $att_class . ' ' . $attr_placeholder . ' ' . $attr_value . ' ' . $attr_data_required . ' ' . $attr_data_val_type . ' placeholder="' . $place_holder . '"'.$steps.'>
                        <i class="fa fa-times invalid-icon" ' . $display_style . '></i>
                        <div class="invalid-feedback" ' . $display_style . '>' . $error . '</div>
                    </div>
                </div>';
        if ($type == 'textarea') {
            $html = '<div class="form-group row" id="' . $pr_id . '">
                        <label for="input_' . $name . '" class="col-12 col-form-label">' . $title . '</label>
                        <div class="col-12">
                            <textarea ' . $attr_type . ' ' . $attr_name . ' ' . $attr_id . ' ' . $att_class . ' ' . $attr_placeholder . ' ' . $attr_data_required . ' ' . $attr_data_val_type . '>' . set_value($name) . '</textarea>
                            <i class="fa fa-times invalid-icon" ' . $display_style . '></i>
                            <div class="invalid-feedback" ' . $display_style . '>' . $error . '</div>
                        </div>
                    </div>';
        }
        if ($type == 'select') {
            $html = '<div class="form-group row" id="' . $pr_id . '">
                        <label for="input_' . $name . '" class="col-12 col-form-label">' . $title . '</label>
                        <div class="col-12">
                            <select ' . $attr_type . ' ' . $attr_name . ' ' . $attr_id . ' ' . $att_class . ' ' . $attr_placeholder . ' ' . $attr_data_required . ' ' . $attr_data_val_type . '>
                                <option value="">Please Select</option>';
            foreach ($options as $op_key => $op_val) {
                $html .= '<option value="' . $op_key . '" ' . set_select($name, $op_key) . '>' . $op_val . '</option>';
            }
            $html .= '</select>
                            <i class="fa fa-times invalid-icon" ' . $display_style . '></i>
                            <div class="invalid-feedback" ' . $display_style . '>' . $error . '</div>
                        </div>
                    </div>';
        }
        return $html;
    }

}
if (!function_exists('genarate_invoice_id')) {

    function genarate_invoice_id() {
        $ci = & get_instance();
        $ci->db->order_by('id', 'DESC')->limit(1);
        $booking_invoice_id = $ci->db->get('invoice')->row();
        if(isset($booking_invoice_id->created_at) && date('M', strtotime($booking_invoice_id->created_at)) == date('M')){
            $id = str_replace(date('MY'), '', $booking_invoice_id->invoice_id);
            $id++;
            $invoice_id = date('MY').$id;
        }else{
            $invoice_id = date('MY').'101';
        }
        return $invoice_id;
    }

}
if (!function_exists('get_product_array_select')) {

    function get_product_array_select() {
        $ci = & get_instance();
        $booking_invoice_id = $ci->db->get('products')->result();

        $products = [];
        foreach ($booking_invoice_id as $product){
            $products[$product->id] = $product->product_name.' - Size: '.$product->size;
        }
        return $products;
    }

}

if (!function_exists('get_product_by_id')) {

    function get_product_by_id($id) {
        $ci = & get_instance();
        $booking_invoice_id = $ci->db->where('id', $id)->get('products')->row_array();
        return $booking_invoice_id;
    }

}

if (!function_exists('get_product_stock_by_id')) {

    function get_product_stock_by_id($id) {
        $ci = & get_instance();
        $stock = 0;
        $crtn = 0;
        $sql = $ci->db->where('products_id', $id)->get('stocks');
        if($sql->num_rows() > 0){
            foreach ($sql->result() as $stocks){
                if($stocks->type == 'dr'){
                    $stock += $stocks->qty;
                    $crtn += $stocks->crtn_qty;
                }else{
                    $stock -= $stocks->qty;
                    $crtn -= $stocks->crtn_qty;
                }
            }
        }
        return $stock.' Unit in '.$crtn.' Carton';
    }

}