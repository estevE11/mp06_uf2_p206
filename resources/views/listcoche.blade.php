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
                            <a href="/coche/create">
                                <button class="btn btn-success float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Fabricant</th>
                          <th scope="col">Model</th>
                          <th scope="col">Data de producció</th>
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