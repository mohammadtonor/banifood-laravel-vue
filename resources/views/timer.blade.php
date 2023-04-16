@extends('layouts.pages')
@section('content')
    <div class="col-12 col-lg-9 mt-3">
        <div class="card">
            <div class="card-body" dir="ltr">
                <span id="second" style="font-size: large" >@{{timer}}</span>
                <button class="btn btn-primary" @click="calculateTimer()" style="position: absolute; right: 100px; top: 10px">Start!</button>
            </div>

        </div>
    </div>
@endsection
