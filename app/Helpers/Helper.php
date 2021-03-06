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

if( !function_exists('getDuration') ) {
    function getDuration() {
        return [
            "1" => "1:00", "1.5" => "1.30", "2" => "2:00", "2.5" => "2.30",
            "3" => "3:00", "3.5" => "3.30", "4" => "4:00", "4.5" => "4.30",
            "5" => "5:00", "5.5" => "5.30", "6" => "6:00", "6.5" => "6.30",
            "7" => "7:00", "7.5" => "7.30", "8" => "8:00"
        ];
    }
}

if( !function_exists('getTime') ) {
    function getTime() {
        return [
            "0" => [ "val" => "07:00", "show" => "7:00", "am_pm" => "AM" ],
            "1" => [ "val" => "07:30", "show" => "7:30", "am_pm" => "AM" ],
            "2" => [ "val" => "08:00", "show" => "8:00", "am_pm" => "AM" ],
            "3" => [ "val" => "08:30", "show" => "8:30", "am_pm" => "AM" ],
            "4" => [ "val" => "09:00", "show" => "9:00", "am_pm" => "AM" ],
            "5" => [ "val" => "09:30", "show" => "9:30", "am_pm" => "AM" ],
            "6" => [ "val" => "10:00", "show" => "10:00", "am_pm" => "AM" ],
            "7" => [ "val" => "10:30", "show" => "10:30", "am_pm" => "AM" ],
            "8" => [ "val" => "11:00", "show" => "11:00", "am_pm" => "AM" ],
            "9" => [ "val" => "11:30", "show" => "11:30", "am_pm" => "AM" ],
            "10" => [ "val" => "12:00", "show" => "12:00", "am_pm" => "PM" ],
            "11" => [ "val" => "12:30", "show" => "12:30", "am_pm" => "PM" ],
            "12" => [ "val" => "13:00", "show" => "1:00", "am_pm" => "PM" ],
            "13" => [ "val" => "13:30", "show" => "1:30", "am_pm" => "PM" ],
            "14" => [ "val" => "14:00", "show" => "2:00", "am_pm" => "PM" ],
            "15" => [ "val" => "14:30", "show" => "2:30", "am_pm" => "PM" ],
            "16" => [ "val" => "15:00", "show" => "3:00", "am_pm" => "PM" ],
            "17" => [ "val" => "15:30", "show" => "3:30", "am_pm" => "PM" ],
            "18" => [ "val" => "16:00", "show" => "4:00", "am_pm" => "PM" ],
            "19" => [ "val" => "16:30", "show" => "4:30", "am_pm" => "PM" ],
            "20" => [ "val" => "17:00", "show" => "5:00", "am_pm" => "PM" ],
            "21" => [ "val" => "17:30", "show" => "5:30", "am_pm" => "PM" ],
        ];
    }
}

if( !function_exists('supported_upload_fileTypes') ) {
    function supported_upload_fileTypes() {
        return 'application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*';
    }
}

if( !function_exists('convertDateToServer') ) {
    function convertDateToServer($date) {
        return date('Y-m-d', strtotime($date));
    }
}

if( !function_exists('directServiceResedential') ) {
    function directServiceResedential() {
        return [1,2,3];
    }
}

if( !function_exists('quoteServiceResedential') ) {
    function quoteServiceResedential() {
        return [7,8,9,10,11,12,13];
    }
}
