<div class='container'>
    <div class='row justify-container-center'>
        <div class='col-md-12'>
            <nav class='nav nav-toggleable-md navbar-light bg-faded'>
                <a class='btn btn-primary' href="{{ route('blog.admin.posts.create') }}">Написать</a>
            </nav>
            <div class='card'>
                <div class='card-body'>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ФИО</th>
                            <th>Дата рождения</th>
                            <th>Тип массажа</th>
                            <th>Анамнез</th>
                            <th>Примечания</th>
                            <th>Фотографии</th>
                            <th>Дата последнего массажа</th>
                            <th>Дата создания записи</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginator as $item)
                            <tr>

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
@endsection
