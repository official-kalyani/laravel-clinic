@php
date_default_timezone_set('Asia/Kolkata');


$selected_slot_time = $selected_slot_time->slot_time;
$break_start_time = date('H:i A', strtotime($appointment_data->break_start_time));
$break_end_time = date('H:i A', strtotime($appointment_data->break_end_time));
$slot_start_time = $appointment_data->slot_start_time;
$slot_end_time = $appointment_data->slot_end_time;
$start_time = strtotime($slot_start_time);
$end_time = strtotime($slot_end_time);

$limit = '';
if($appointment_data->available_category == '15min') {
        $limit = '900';
    } else {
        $limit = '1800';
    }
@endphp


<div class="row">
@for ($time = $start_time; $time <= $end_time; $time += $limit)
<div class="col-md-4 mb-3">
<div class="custom-control custom-checkbox">
@php
$current_time = date('H:i A', $time);
$disabled = ($current_time >= $break_start_time && $current_time <= $break_end_time) ? 'disabled' : '';
$class = ($current_time >= $break_start_time && $current_time <= $break_end_time) ? 'disabled-checkbox' : '';
$checked = ($current_time == $selected_slot_time) ? 'checked' : '';
@endphp
<!-- <input type="radio" class="custom-control-input" id="{{ $current_time }}" name="slot_time" value="{{ $current_time }}" {{ $disabled }} > -->
<!-- for used to check if it is compared with  -->

<!-- $selected_slot_time = $selected_slot_time->slot_time; -->
<input type="radio" class="custom-control-input" id="{{ $current_time }}" name="slot_time" value="{{ $current_time }}" {{ $disabled }} {{ $checked }}>
<!-- <input type="checkbox" class="custom-control-input" id="{{ $current_time }}" name="slot_time[]" value="{{ $current_time }}" {{ $disabled }}> -->
<label class="custom-control-label {{ $class }}" for="{{ $current_time }}">{{ $current_time }}</label>
</div>
</div>
@endfor
</div>