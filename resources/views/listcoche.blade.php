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
                        <div class="col">
                            <h4 class="mt-1">Cotxes</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-success float-right"><b>+</b></button>
                        </div>
                    </div>
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
                        @foreach($coches as $coche) 
                            <tr>
                                <th scope="row">{{$coche->id}}</th>
                                <th><a href="/coche/{{$coche->id}}">{{$coche->make}}</a></th>
                                <td>{{$coche->model}}</td>
                                <td>{{$coche->produced_on}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<script>
    let coche;

    window.onload = () => {
        coche = <?php echo json_encode($coche); ?>;
    }

    function goToCreate() {
        window.location.href = "";
    }
    function goToEdit(id) {
        window.location.href = "";
    }

    function go(id) {
        window.location = id;
    }
</script>

@endsection