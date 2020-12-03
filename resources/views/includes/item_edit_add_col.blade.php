<div class='row justify-content-center'>
    <div class='col-md-12 pb-4'>
        <div class='card'>
            <div class='card-body'>
                <button type='submit' class='btn btn-primary'>Сохранить</button>
            </div>
        </div>
    </div>
</div>
@if($item->exists)
    <div style="display: none" class='row justify-content-center'>
        <div class='col-md-12'>
            <div class='card'>
                <div class='card-body'>
                    <ul class='list-unstyled'>
                        <li id="id-patient">{{$item->id}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='row justify-content-center'>
        <div class='col-md-12'>
            <div class='card'>
                <div class='card-body'>
                    <div class='form-group'>
                        <label for='title'>Создано</label>
                        <input type='text' value='{{$item->created_at}}' class='form-control' disabled>
                    </div>
                    <div class='form-group'>
                        <label for='title'>Изменено</label>
                        <input type='text'value='{{$item->updated_at}}' class='form-control' disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endif
<div class='row justify-content-center'>
    <div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <a href="{{ route('client.index') }}" class='btn btn-primary'>Назад к списку</a>
            </div>
        </div>
    </div>
</div>
