@if (Auth::check())    
@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Diseno
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Diseno</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('disenos.update', $diseno->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('diseno.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
