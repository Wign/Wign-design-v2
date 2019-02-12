@extends('layouts.master')

@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-8 bg-success">
                <h1>Hjerte</h1>
                <p>@lang('text.meant.2words', ['word1' => 'Hjerne', 'word2' => 'Hjernedød'])</p>

                <signMediaComponent></signMediaComponent>
            </div>
            <div class="col-3 offset-1 bg-secondary">
            </div>
        </div>
    </div>
@endsection