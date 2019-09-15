@extends('layouts.master')

@section('content')
    <div class="container mx-auto" style="margin-top: 80px">
        <div class="flex flex-wrap">
            <article class="w-2/3 pr-10">
                <h1 class="text-4xl font-bold">Hjerte</h1></slot>
                <slot name="subheader"><p>@lang('text.sign.meant.2word', ['word1' => '<a href="#" class="underline">Hjerne</a>', 'word2' => '<a href="#" class="underline">Hjernedød</a>'])</p></slot>

                <sign-list :with-cta="true"></sign-list>
            </article>

            <aside class="w-1/4 ml-5 bg-summergreen-translucent-20">
            </aside>
        </div>
    </div>
@endsection