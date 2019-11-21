<div class="flex flex-wrap">
    <h2 class="w-full font-bold uppercase">@lang('text.Requested.title')</h2>
    @lang('text.discover.request.text', ['count' => 852])
</div>

<div class="flex flex-wrap justify-start items-center content-start">
    <request-list num-words="10" class="m-auto"></request-list>
</div>
<div class="flex flex-wrap">
    <div class="w-full sm:w-2/3 md:w-full xl:w-2/3 px-4 my-2">
        <button type="button"
                class="btn btn-tyrisk w-full">@lang('text.requested.see.all')</button>
    </div>
</div>
