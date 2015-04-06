<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function state_dropdown($states) {
    echo '<select class="form-control" name="ddl_state" id="ddl_state" onchange="bind_city_dropdown(this)" data-cityDropdown="ddl_City" >
            <option value="0">--select--</option>';
    foreach ($states['states_for_dropdown'] as $row)
        if ($states['state_id'] == $row['state_id'])
            echo '<option value="' . $row['state_id'] . '" selected="selected">' . $row['state_name'] . '</option>';
        else {
            echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
        }


    echo '</select>';
}

function city_dropdown($cities) {
    echo '<select class="form-control" name="ddl_city" id="ddl_City" onchange="bind_pinCode_dropdown(this)"  data-PinCodeDataList="dl_pincodes" data-PinCodeInput="txt_pincode">
            <option value="0">--select--</option>';
    if (isset($cities['cities_for_dropdown']))
        foreach ($cities['cities_for_dropdown'] as $row)
            if ($cities['city_id'] == $row['city_id'])
                echo '<option value="' . $row['city_id'] . '" selected="selected">' . $row['city_name'] . '</option>';
            else {
                echo '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
            }
    echo '</select>';
}

function pinCode_dropdown($pincodes) {
    echo '<input name="txt_pincode" value="' . ($pincodes['pin_code'] !== 0 ? $pincodes['pin_code'] : "") . '"  id="txt_pincode" list="dl_pincodes" class="form-control" oninput="clear_error_span(this)"/> ';
    echo '<datalist id="dl_pincodes"  onselect="clear_error_span(this)">';
    if (isset($pincodes['pinCodes_for_dropdown']))
        foreach ($pincodes['pinCodes_for_dropdown'] as $row)
            echo '<option>' . $row['pin_code'] . '</option>';
    echo '</datalist>';
}

?>