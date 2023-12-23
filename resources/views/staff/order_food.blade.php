@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')

@foreach($food_groups as $food_group)
@if($food_group->foods)
<div class="container bg-body border rounded shadow-sm pt-4 pb-4 ps-5 pe-5 mb-4">
    <h5>{{$food_group->name}}</h5>
    @foreach($food_group->foods as $food)
    <div class="input-group mt-3">
        <span class="input-group-text fw-bold pe-4">{{$food->name}}</span>
        <span class="input-group-text">{{$food->money}} VND</span>
        <input type="number" id="food_{{$food->id}}" class="form-control text-center" value="0">
        <button input="food_{{$food->id}}" class="btn btn-outline-primary ps-4 pe-4" onclick="increase(event)">+</button>
        <button input="food_{{$food->id}}" class="btn btn-outline-secondary ps-4 pe-4" onclick="decrease(event)">-</button>
    </div>
    @endforeach
</div>
@endif
@endforeach

<form method="POST" class="container bg-body mt-5" id="formSubmit">
    @csrf
    <input id='json' name="list_order" type="hidden">
    <button type="button" onclick="submit_food()" class="btn btn-primary float-end">
        Đặt món
    </button>
    <div>
        <a class="btn btn-secondary" href="/">Trang trước</a>
    </div>
</form>

@endsection

@section('style')

@endsection

@section('script')
<script>
    function increase(event) {
        let input = event.target.getAttribute("input");
        let input_element = document.getElementById(input);
        input_element.value = +input_element.value + 1;
    }

    function decrease(event) {
        let input = event.target.getAttribute("input");
        let input_element = document.getElementById(input);
        input_element.value =
            input_element.value === "0" ? "0" : +input_element.value - 1;
    }

    const list_items = [
        @foreach($foods as $food)
        {{$food->id}},
        @endforeach
    ];

    function submit_food() {
        let result = {};
        for (let item_key of list_items) {
            let number = +document.getElementById(`food_${item_key}`).value
            if (number > 0){
                result[item_key] = number;
            }
        }
        document.getElementById("json").value = JSON.stringify(result);

        document.getElementById("formSubmit").submit();
    }
</script>
@endsection
