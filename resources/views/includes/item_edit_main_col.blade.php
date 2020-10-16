<div class='row justify-content-center'>
    <div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                <div class='card-title'></div>
                <ul class='nav nav-tabs' role='tablist'>
                    <li class='nav-item'>
                        <a class='nav-link active' data-toggle='tab' href='#maindata' role='tab'>Данные о пациенте</a>
                    </li>
                </ul>
                <br>
                <div class='tab-content'>
                    <div class='tab-pave active' id='maindata' role='tabpanel'>
                        <div class='form-group'>
                            <label for='fio'>ФИО</label>
                            <input name='fio' value='{{ $item->fio }}'
                                   id='fio'
                                   type='text'
                                   class='form-control'
                                   minlength='3'
                                   required
                            >
                        </div>
                        <div class='form-group'>
                            <label for='date_of_birth'>Дата рождения</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value='{{ $item->date_of_birth }}'>
                        </div>
                        <div class='form-group'>
                            <label for='last_massage'>Дата последнего массажа</label>
                            <input type="date" class="form-control" id="last_massage" name="date_of_birth" value='{{ $item->last_massage }}'>
                        </div>
                        <div class='form-group'>
                            <label for='massage_type'>Тип массажа</label>
                            <textarea name='massage_type'
                                      id='massage_type'
                                      rows='3'
                                      class='form-control'
                            >{{ old('massage_type',$item->massage_type) }}</textarea>
                        </div>
                        <div class='form-group'>
                            <label for='medical_background'>Анамнез</label>
                            <textarea name='medical_background'
                                      id='medical_background'
                                      rows='3'
                                      class='form-control'
                            >{{ old('medical_background',$item->medical_background) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

