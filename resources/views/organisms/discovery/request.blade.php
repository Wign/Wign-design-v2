<div class="flex flex-wrap">
    <h2 class="w-full font-bold uppercase">@lang('text.Requested.title')</h2>
    @lang('text.discover.request.text', ['count' => 852])
</div>

<div class="flex flex-wrap justify-start items-center content-start">
    <request-list num-words="10" class="m-auto"></request-list>
</div>

<div class="flex flex-wrap">
    <a href="{{@route('request.index')}}" class="sm:w-2/3 md:w-full xl:w-2/3">
    @component('atoms.btn_turkis')
        @lang('text.requested.see.all')
    @endcomponent
    </a>
</div>
