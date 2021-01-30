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
                            <input type="text" class="form-control float-right" id="searchbar" style="font-size: 18px;" placeholder="Buscar...">
                        </div>
                        <div class="col-1">
                            <a href="/coche/create">
                                <button class="btn btn-success float-right p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Fabricant</th>
                          <th scope="col">Model</th>
                          <th scope="col">Data de producció</th>
                        </tr>
                      </thead>
                      <tbody id="tb-cotxes">
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
    let cotxes;

    window.onload = () => {
        cotxes = <?php echo json_encode($coches); ?>;
        
        const searchbar = $('#searchbar');
        searchbar.keyup(()=> {
            const search = searchbar.val();
            const list = filter(search);
            console.log(list);
            renderTable(list.length > 0 ? list : cotxes);
        });
    }

    function renderTable(list) {
        let tablebody = $('#tb-cotxes');
        tablebody.html('');
        for(let i = 0; i < list.length; i++) {
            tablebody.append(`
                <tr>
                    <th scope="row">${list[i].id}</th>
                    <th><a href="/coche/${list[i].id}">${list[i].make}</a></th>
                    <td>${list[i].model}</td>
                    <td>${list[i].produced_on}</td>
                </tr>
            `);
        }
    }

    function filter(search) {
        return cotxes.filter(cotxe => cotxe.make.toLowerCase().includes(search.toLowerCase()) || cotxe.model.toLowerCase().includes(search.toLowerCase()) ||
        cotxe.produced_on.toLowerCase().includes(search.toLowerCase()));
    }
</script>

@endsection