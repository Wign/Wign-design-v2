@extends('templates.plain')

@section('plainContent')
    @include('molecules.content_header', ['prefix' => 'text.recent'])
            <p>@lang('text.recent.request', ['url' => URL::to('ask')])</p>

    <div class="flex flex-wrap">
        <overview-component></overview-component>
    </div>
@endsection
