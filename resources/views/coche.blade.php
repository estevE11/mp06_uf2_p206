@extends('master')

@section('title', 'Visualitzador avançat de vehicles a motor')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Cotxe
                </div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Make</th>
                          <th scope="col">Model</th>
                          <th scope="col">Production date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">{{$coche->id}}</th>
                          <td>{{$coche->make}}</td>
                          <td>{{$coche->model}}</td>
                          <td>{{$coche->produced_on}}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Navegació</div>
                <div class="card-body">
                    <button class="btn btn-primary" onclick="move(-1)">Anterior</button>
                    <button class="btn btn-primary" onclick="move(1)">Seguent</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let coche;

    window.onload = () => {
        coche = <?php echo json_encode($coche); ?>;
    }

    function move(steps) {
        moveTo(coche.id+steps);
    }

    function moveTo(id) {
        window.location = id;
    }
</script>

@endsection