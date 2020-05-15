<div class="form-group" style="padding: 5px">
    @if(isset($title))<strong style="margin-bottom: 10px!important;">{!! $title !!}</strong>@endif
    <select name="{{ $name }}" id="id{{str_replace('[]','',$name)}}" class="form-control"
            @if(isset($multiple)) multiple @endif @if(isset($submit)) onchange="$('#{{$submit}}').trigger('submit')" @endif>
        <option value="">{{ isset($placeholder) ? $placeholder : 'Выберите' }}</option>
        @if(isset($default['val']) && $default['val'] && isset($default['text']) && $default['text'])
            <option value="{{ $default['val'] }}" selected="selected">{{$default['text']}}</option>
        @endif
        @if(isset($default['val']) && is_array($default['val']))
            @foreach($default['val'] as $key => $text)
                <option value="{{ $key }}" selected="selected">{{ $text }}</option>
            @endforeach
        @endif
    </select>
</div>
@push('styles')
    <style>
        .select2-selection {
            height: 34px !important;
            border: #e5e6e7 solid 1px !important;
            border-radius: 1px !important;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#id{{str_replace('[]','',$name)}}').select2({
                delay: 250,
                minimumInputLength: 3,
                ajax: {
                    method: 'post',
                    url: '{{ route($route) }}',
                    dataType: 'json',
                    data: (params) => {
                        return {search: params.term};
                    },
                    processResults: (response) => {
                        return {results: response};
                    },
                }
            });
        });

    </script>
@endpush
