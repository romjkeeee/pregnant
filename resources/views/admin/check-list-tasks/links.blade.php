<li @if (Route::current()->getName() == 'admin.check-list-tasks.index') class="active" @endif><a href="{{ route('admin.check-list-tasks.index') }}">Список тасков</a></li>
<li @if (Route::current()->getName() == 'admin.check-list-tasks.create') class="active" @endif><a href="{{ route('admin.check-list-tasks.create') }}">Добавить таск</a></li>
