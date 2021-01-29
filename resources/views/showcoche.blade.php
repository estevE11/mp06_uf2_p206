@extends('master')

@section('title', 'Visualitzador avançat de vehicles a motor')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="mt-1">{{$coche->model}}</h3>
                        </div>
                        <div class="col">
                            <a href="/coche/{{$coche->id}}/edit">
                                <button class="btn btn-success float-right" type="submit" form="car-data">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ml-2">
                        <div class="col-6">
                            <div class="row"><span>Fabricant</span></div>
                            <div class="row"><h3>{{$coche->make}}</h3></div>
                        </div>
                        <div class="col-6">
                            <div class="row"><span>Data de producció</span></div>
                            <div class="row"><h3>{{$coche->produced_on}}</h3></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if(isset($updated)) {
                    $al = 'danger';
                    $msg = 'No sha pogut actualitzar el vehicle';
                    if($updated) {
                        $al = 'succcess';
                        $msg = 'Vehicle actualitzat correctement';
                    }
                    echo '<div class="alert alert-'. $al . '">' . $msg . '</div>';
                }
            ?>
        </div>
        <div class="col-3"></div>
        <i class="bi bi-file-earmark-arrow-up"></i>
    </div>
</div>

<script>
    let coche;
    function move(steps) {
        moveTo(coche.id+steps);
    }

    function moveTo(id) {
        window.location = id;
    }
</script>

@endsection