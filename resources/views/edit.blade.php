<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@if($item->exists)
    <form class="bg-secondary" method='POST' action="{{ route('client.update', $item->id ) }}">
        @method('PATCH')
        <h1 class="text-center text-white p-2">Просмотр и редактирование пациента</h1>
        @else
            <form class="bg-secondary" method='POST' action="{{ route('client.store') }}">
                <h1 class="text-center text-white p-2">Дабавление записи</h1>
                @endif
                @csrf
                <div class='container'>
                    <div class='row justify-container-center'>
                        <div class='col-md-8'>
                            @include('includes.item_edit_main_col')
                        </div>
                        <div class='col-md-3'>
                            @include('includes.item_edit_add_col')
                        </div>
                    </div>
                </div>
            </form>
