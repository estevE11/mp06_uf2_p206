@extends('master')

@section('title', 'Visualitzador avançat de vehicles a motor')

@section('content')
<?php if(isset($err)) echo $err;?>
<div class="container-fluid">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-1 mr-0">
                            <a href="/coche">
                                <button type="button" class="close mt-2 float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="col float-left ml-0">
                            <h3 class="mt-1">{{$coche->model}}</h3>
                        </div>
                        <div class="col">
                            <a href="/coche/{{$coche->id}}/edit">
                                <button class="btn btn-success float-right p-2" type="submit" form="car-data">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </a>
                            <button class="btn btn-danger float-right mr-4 p-2" type="button" data-toggle="modal" data-target="#deleteModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg> 
                            </button>
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
                        $al = 'success';
                        $msg = 'Vehicle actualitzat correctement!';
                    }
                    echo '<div class="alert alert-'. $al . '">' . $msg . '</div>';
                }
            ?>
        </div>
        <div class="col-3"></div>
        <i class="bi bi-file-earmark-arrow-up"></i>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Atenció!</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Estas segur que vols eliminar el vehicle?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <form action="/coche/{{$coche->id}}" method="POST" id="delete-data">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-right mr-4" type="submit" form="delete-data">
                        SI
                    </button>
                </form>
            </div>
        </div>
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