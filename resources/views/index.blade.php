<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class='container mt-3'>
    <div class='row justify-container-center'>
        <div class='col-md-12'>
            <nav class='nav nav-toggleable-md navbar-light bg-faded mb-3'>
                <a class='btn btn-primary ' href="{{ route('client.create') }}">Добавить пациента</a>
            </nav>
            <div class='card'>
                <div class='card-body'>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th  class="col-auto">#</th>
                            <th  class="col-md-auto">ФИО</th>
                            <th  class="col-md-auto">Дата рождения</th>
                            <th  class="col-md-auto">Тип массажа</th>
                            <th  class="col-md-auto">Анамнез</th>
                            <th  class="col-md-auto">Примечания</th>
                            <th  class="col-md-auto">Дата последнего массажа</th>
                            <th  class="col-md-auto">Дата создания записи</th>
                            <th  class="col-md-auto">Добавить фотографию попок</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td >{{$item->fio}}</td>
                                <td>{{$item->date_of_birth}}</td>
                                <td>{{$item->massage_type}}</td>
                                <td>{{$item->medical_background}}</td>
                                <td>{{$item->annotation}}</td>
                                <td>{{$item->last_massage}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <button class="btn btn-primary">Добавить</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if($paginator->total() > $paginator->count())
    <div class='row justify-container-center'>
        <div class='col-md-12'>
            <div class='card'>
                {{ $paginator->links() }}
            </div>
        </div>
    </div>
@endif
