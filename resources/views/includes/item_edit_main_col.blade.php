@include('includes.result_message')
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
                            <label for='birthday'>Дата рождения</label>
                            <input type="date"
                                   class="form-control"
                                   id="birthday"
                                   name="birthday"
                                   value='{{ $item->birthday }}'>
                        </div>
                        <div class='form-group'>
                            <label for='last_massage'>Дата последнего массажа</label>
                            <input type="date"
                                   class="form-control"
                                   id="last_massage"
                                   name="last_massage"
                                   value='{{ $item->last_massage }}'>
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
                            <label for='medical_background'>Жалобы</label>
                            <textarea name='medical_background'
                                      id='medical_background'
                                      rows='3'
                                      class='form-control'
                            >{{ old('medical_background',$item->medical_background) }}</textarea>
                        </div>
                        <div class='form-group'>
                            <label for='skin_diseases'>Кожные заболевания</label>
                            <input name='skin_diseases'
                                   value='{{ $item->skin_diseases }}'
                                   id='skin_diseases'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='JKT_diseases'>Заболевания ЖКТ</label>
                            <input name='JKT_diseases'
                                   value='{{ $item->JKT_diseases }}'
                                   id='JKT_diseases'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='adenopathia'>Заболевания лимфатической системы</label>
                            <input name='adenopathia'
                                   value='{{ $item->adenopathia }}'
                                   id='adenopathia'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='endocrine_system'>Наличие заболеваний эндокринной сферы</label>
                            <input name='endocrine_system'
                                   value='{{ $item->endocrine_system }}'
                                   id='endocrine_system'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='CDV'>Сердечно - сосудистые заболевания</label>
                            <input name='CDV'
                                   value='{{ $item->CDV }}'
                                   id='CDV'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='respiratory_diseases'>Заболевания дыхательной системы</label>
                            <input name='respiratory_diseases'
                                   value='{{ $item->respiratory_diseases }}'
                                   id='respiratory_diseases'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='pregnant'>Беременность, период локтации</label>
                            <input name='pregnant'
                                   value='{{ $item->pregnant }}'
                                   id='pregnant'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='allergic_response'>Аллергичекие реакции</label>
                            <input name='allergic_response'
                                   value='{{ $item->allergic_response }}'
                                   id='allergic_response'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='gynecological_diseases'>Гинекологические заболевания</label>
                            <input name='gynecological_diseases'
                                   value='{{ $item->gynecological_diseases }}'
                                   id='gynecological_diseases'
                                   type='text'
                                   class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                            <label for='drugs'>Принимаемые в настоящий момент медикаменты</label>
                            <input name='drugs'
                                   value='{{ $item->drugs }}'
                                   id='drugs'
                                   type='text'
                                   class='form-control'
                            >
                        </div>

                        <div class='form-group'>
                            <label for='annotation'>Примечания</label>
                            <textarea name='annotation'
                                      id='annotation'
                                      rows='3'
                                      class='form-control'
                            >{{ old('annotation',$item->annotation) }}</textarea>
                        </div>
                        <div class="form-check">
                            <input name="is_active"
                                   type="hidden"
                                   value="0"
                            >
                            <input name="is_active"
                                   type="checkbox"
                                   class="form-check-input"
                                   value="1"
                                   @if($item->is_active)
                                   checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="is_active">На данный момент пациент на массаже?</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var date=document.getElementById('birthday').getAttribute('value');
    document.getElementById('birthday').value=date.split('.').reverse().join('-');
    var date=document.getElementById('last_massage').getAttribute('value');
    document.getElementById('last_massage').value=date.split('.').reverse().join('-');
</script>


