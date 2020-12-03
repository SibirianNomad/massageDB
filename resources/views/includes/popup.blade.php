<div class="modal fade" id="deleteRecord{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Хочешь удалить пациента?</h5>
            </div>
            <div class="modal-body">
                <p>{{$item->fio}}</p>
                <form class="mt-2" method='POST' action="{{ route('client.destroy', $item->id ) }}">
                    @method('DELETE')
                    @csrf
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Да</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
