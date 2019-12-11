<?php

if( !function_exists('setflashmsg') ) {
    function setflashmsg($msg,$type = '1') {
        if($type == '1') {
            request()->session()->flash('notify-success', $msg);
        } else {
            request()->session()->flash('notify-error', $msg);
        }
    }
}

if( !function_exists('getDays') ) {
    function getDays($_blank = NULL) {
        if( $_blank ) {
            return [ 'sunday' => [], 'monday' => [], 'tuesday' => [], 'wednesday' => [], 'thursday' => [], 'friday' => [], 'saturday' => [] ];
        } else {
            return [ 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];
        }
    }
}

if( !function_exists('getHours') ) {
    function getHours() {
        return [ "24" => "24 hours", "00:00" => "12:00 am", "00:30" => "12:30 am", "01:00" => "1:00 am",
                "01:30" => "1:30 am", "02:00" => "2:00 am", "02:30" => "2:30 am", "03:00" => "3:00 am", "03:30" => "3:30 am",
                "04:00" => "4:00 am", "04:30" => "4:30 am", "05:00" => "5:00 am", "05:30" => "5:30 am", "06:00" => "6:00 am",
                "06:30" => "6:30 am", "07:00" => "7:00 am", "07:30" => "7:30 am", "08:00" => "8:00 am", "08:30" => "8:30 am",
                "09:00" => "9:00 am", "09:30" => "9:30 am", "10:00" => "10:00 am", "10:30" => "10:30 am", "11:00" => "11:00 am",
                "11:30" => "11:30 am", "12:00" => "12:00 pm", "12:30" => "12:30 pm", "13:00" => "1:00 pm", "13:30" => "1:30 pm",
                "14:00" => "2:00 pm", "14:30" => "2:30 pm", "15:00" => "3:00 pm", "15:30" => "3:30 pm", "16:00" => "4:00 pm",
                "16:30" => "4:30 pm", "17:00" => "5:00 pm", "17:30" => "5:30 pm", "18:00" => "6:00 pm", "18:30" => "6:30 pm",
                "19:00" => "7:00 pm", "19:30" => "7:30 pm", "20:00" => "8:00 pm", "20:30" => "8:30 pm", "21:00" => "9:00 pm",
                "21:30" => "9:30 pm", "22:00" => "10:00 pm", "22:30" => "10:30 pm", "23:00" => "11:00 pm", "23:30" => "11:30 pm" ];
    }
}
