<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.destroy') }}" method="post" class="modal-content">@csrf
            <div class="modal-header" style="display: flex;justify-content: space-between">
                <h4 class="modal-title">Вы действительно хотите удалить запись?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer" style="padding: 5px">
                @php $class = $model ?? (isset($items) && $items->first() ? get_class($items->first()) : null) @endphp
                <input hidden name="model" value="{{ $class }}">
                <input hidden name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                <button type="submit" class="btn btn-primary">Подтвердить</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        function appendDestroyData(id) {
            $('[name=id]').val(id);
        }
    </script>
@endpush
