@extends('templates.plain')

@section('plainContent')
    @include('molecules.content_header', ['prefix' => 'text.request'])
    <request-page sort-text="@lang('text.request.sort.title')" request-text="@lang('text.request.sort.request')"
                  alpha-text="@lang('text.request.sort.alpha')" see-more-text="@lang('text.request.see_all')"></request-page>
@endsection
