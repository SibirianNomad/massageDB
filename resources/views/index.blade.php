<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
<link rel="stylesheet" href={{ asset('css/layout.css') }}>
<script src={{ asset('js/jquery.js') }}></script>
<script src={{ asset('js/bootstrap.js') }}></script>
<script src={{ asset('js/masonry/imagesloaded.pkg.min.js') }}></script>
<script src={{ asset('js/masonry/masonry.pkgd.min.js') }}></script>
<script src={{ asset('js/main.js') }}></script>


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
    <form action="{{ route('client.show',1) }}" method="GET">
        @csrf
        <div class="input-group pull-right">
            <input type="text"
                   class="form-control"
                   placeholder="Поиск пациента"
                   id="searchText"
                   name="searchText"
            />
            <div class="input-group-btn pull-right">
                <button class="btn btn-primary" type="submit">
                    Искать
                </button>
            </div>
        </div>
    </form>
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
                            <th  class="col-md-auto">ФИО</th>
                            <th  class="col-md-auto">Дата рождения</th>
                            <th  class="col-md-auto">Примечания</th>
                            <th  class="col-md-auto">Дата последнего массажа</th>
                            <th  class="col-md-auto">Добавить фотографию</th>
                            <th  class="col-md-auto">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
                            <tr  @if($item->is_active) style="background-color:chartreuse;" @endif>

                                <td>
                                    <a href="{{ route('client.edit', $item->id) }}">
                                        {{$item->fio}}
                                    </a>
                                 </td>

                                <td>{{$item->birthday}}</td>
                                <td>{{$item->annotation}}</td>
                                <td>{{$item->last_massage}}</td>
                                <td class="text-center">
                                    <form id='upload_photo' method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class=«col-md-6»>
                                            <input onchange='uploadPhoto({{$item->id}})' type='file' id="files_{{$item->id}}" name='image' class="form-control-file" hidden>
                                            <label for="files_{{$item->id}}" class="btn btn-warning">Выбрать фото</label>
                                            <input hidden name="id" value="{{$item->id}}">
                                            <input hidden name="fio" value="{{$item->fio}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Добавить</button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a  class="btn btn-primary mb-1" href="{{ route('client.edit', $item->id) }}">
                                        Редактировать
                                    </a>
                                    @if($item->photo)
                                        <button type="submit"
                                                class="btn btn-primary mb-1"
                                                onclick="unloadPhoto({{$item->id}},'{{$item->fio}}')"
                                                data-toggle="modal"
                                                data-target="#popupImages"
                                        >Фотографии</button>
                                    @endif
                                        <button type="submit"
                                                class="btn btn-danger mb-1"
                                                data-toggle="modal"
                                                data-target="#deleteRecord{{$item->id}}"
                                        >Удалить</button>
                                    @include('includes.popup')
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
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
</div>

@include('includes.popup_images')
