<div class="flex flex-wrap">
    <h2 class="w-full font-bold uppercase">@lang('text.Discover')</h2>
    @lang('text.discover.sign.text', ['count' => 999])
</div>

<div class="flex flex-wrap -mx-2">
    <!-- HERE A LOT THUMBS! -->
    <sign-component></sign-component>
    <sign-component></sign-component>
    <sign-component></sign-component>
    <sign-component></sign-component>
    <sign-component></sign-component>
    <sign-component></sign-component>
    <sign-component></sign-component>
    <sign-component></sign-component>
</div>

<div class="flex flex-wrap">
    @component('atoms.btn_turkis', ['class' => 'sm:w-2/3 lg:w-1/2'])
        @lang('text.sign.see.random')
    @endcomponent
</div>
