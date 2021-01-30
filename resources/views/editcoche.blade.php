<?php
    $editMode = false;
    if(isset($coche)) {
        $editMode = true;
    }
    
    $met = '';
    if(isset($coche)) {
        $met ='PUT';
    }

?>

@extends('master')

@section('title', 'Visualitzador avançat de vehicles a motor')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-1 mr-0">
                            <a href="/coche/{{$coche->id ?? ''}}">
                                <button type="button" class="close mt-1 float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="col float-left ml-0">
                            <h4 class="mt-1">Cotxe #{{$coche->id ?? '?'}}</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-success float-right p-1" type="submit" form="car-data">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                    <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pl-4 pr-4">
                    <form action="/coche/{{$coche->id ?? ''}}" method="POST" id="car-data">
                        @csrf
                        @if ($met == 'PUT')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Fabricant</label>
                                    <input type="text" class="form-control" id="inpt-maker" name="make">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Model</label>
                                    <input type="text" class="form-control" id="inpt-model" name="model">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Production date</label>
                                    <input type="date" class="form-control" id="inpt-date" name="produced_on" placeholder="Production date">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
        <i class="bi bi-file-earmark-arrow-up"></i>
    </div>
</div>

<script>
    let coche;

    window.onload = () => {
        coche = <?php if($editMode) {echo json_encode($coche);} else echo null;?>;
        $('#inpt-maker').val(coche.make);
        $('#inpt-model').val(coche.model);
        document.getElementById("inpt-date").valueAsDate = new Date(coche.produced_on)
    }

    function move(steps) {
        moveTo(coche.id+steps);
    }

    function moveTo(id) {
        window.location = id;
    }
</script>

@endsection