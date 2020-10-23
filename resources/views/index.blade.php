<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class='h-100 pt-3 px-5 bg-secondary'>
    <div class='text-center text-white h4'>
        Сегодня {{ $day }}
    </div>
    @if($birthdays)
        <h5 class="text-white m-2">Ближайшие дни рождения: </h5>
        @foreach($birthdays as $key=>$item)
            <p class="text-white">{{$key+1}} {{$item['fio']}} {{$item['birthday']}}</p>
        @endforeach
    @endif
@include('includes.result_message')
    <div class='row justify-container-center'>
        <div class='col-md-12'>
            <nav class='nav nav-toggleable-md navbar-light bg-faded mb-3'>
                <a class='btn btn-primary ' href="{{ route('client.create') }}">Добавить пациента</a>
            </nav>
            <div class='card'>
                <div class='card-body bg-secondary'>
                    <table class='table table-hover bg-white'>
                        <thead>
                        <tr>
                            <th  class="col-auto">#</th>
                            <th  class="col-md-auto">ФИО</th>
                            <th  class="col-md-auto">Дата рождения</th>
                            <th  class="col-md-auto">Тип массажа</th>
                            <th  class="col-md-auto">Клиент на массаже?</th>
                            <th  class="col-md-auto">Анамнез</th>
                            <th  class="col-md-auto">Примечания</th>
                            <th  class="col-md-auto">Дата последнего массажа</th>
                            <th  class="col-md-auto">Дата создания записи</th>
                            <th  class="col-md-auto">Добавить фотографию</th>
                            <th  class="col-md-auto">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
                            <tr>
                                <td>{{$item->id}}</td>

                                <td>
                                    <a href="{{ route('client.edit', $item->id) }}">
                                        {{$item->fio}}
                                    </a>
                                 </td>

                                <td>{{$item->birthday}}</td>
                                <td>{{$item->massage_type}}</td>
                                <td>
                                    @if($item->is_active)
                                        да
                                    @else
                                        нет
                                    @endif
                                </td>
                                <td>{{$item->medical_background}}</td>
                                <td>{{$item->annotation}}</td>
                                <td>{{$item->last_massage}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <button class="btn btn-primary btn-block">Добавить</button>
                                </td>
                                <td>
                                    <a  class="btn btn-primary btn-block" href="{{ route('client.edit', $item->id) }}">
                                        Редактировать
                                    </a>
                                    <form class="mt-2" method='POST' action="{{ route('client.destroy', $item->id ) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block">Удалить</button>
                                    </form>
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
