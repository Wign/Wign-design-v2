@extends('templates.plain')

@section('plainContent')
    @include('molecules.content_header', ['title' => 'Hjerte', 'description' => __('text.sign.meant.two_words', ['suggestword1' => '<a href="#" class="underline">Hjerne</a>', 'suggestword2' => '<a href="#" class="underline">Hjernedød</a>'])])
    <sign-list :with-cta="true"></sign-list>
@endsection
