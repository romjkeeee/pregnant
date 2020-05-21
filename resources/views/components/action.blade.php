<div class="btn-group">
    @if(isset($edit)) <a href="{{ $edit }}" class="btn-white btn btn-xs"><i class="fa fa-pencil"></i></a> @endif
    @if(isset($delete))
        <button class="btn-white btn btn-xs" data-toggle="modal" data-target="#exampleModal" onclick="appendDestroyData('{{ $delete }}')">
            <i class="fa fa-close"></i>
        </button>
    @endif
</div>
