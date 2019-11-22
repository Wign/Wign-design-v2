@extends('templates.plain')

@section('plainContent')
    <div class="flex flex-wrap">
        <div class="w-full">
            <h1>@lang('text.recent.title')</h1>
            <p>@lang('text.recent.desc2')</p>
            <p>@lang('text.recent.request', ['url' => URL::to('ask')])</p>
        </div>
    </div>

    <div class="flex flex-wrap">
        <overview-component></overview-component>
    </div>
@endsection
