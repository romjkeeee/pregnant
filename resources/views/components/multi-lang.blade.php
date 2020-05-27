<div class="col-lg-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach(app()->langs as $lang)
            <li class="nav-item @if(!$loop->index) active @endif">
                <a class="nav-link" id="{{ $lang->code }}-tab" data-toggle="tab" href="#{{ $lang->code }}">{{ $lang->name }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">
        @foreach(app()->langs as $lang)
            <div class="tab-pane @if(!$loop->index) active @endif" id="{{ $lang->code }}" role="tabpanel">
                <input type="text" name="translate[][lang_id]" value="{{ $lang->id }}" hidden>
                @php $index = $loop->index @endphp
                @foreach($fields as $field)
                    <div class="col-lg-6">
                        <div class="form-group" style="padding: 5px">
                            <strong style="margin-bottom: 10px!important;">{!! $field['title'] !!}</strong>
                            @php $name = $field['name']; @endphp
                            @php $value = old('translate')[$index][$name] ??
                            (isset($instance->translates) ? $instance->translates->where('lang_id', $lang->id)->first()->$name ?? null : null) @endphp
                            <input type="text" name="translate[{{ $index }}][{{ $name }}]"
                                   value="{{ old('translate')[$index][$name] ?? $value}}"
                                   class="form-control">
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
