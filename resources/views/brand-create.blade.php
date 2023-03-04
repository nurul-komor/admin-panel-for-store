@extends('layout.main')
@section('main-section')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">{{ $formTitle }}</h5>
                    {!! Form::open([
                        'url' => url($url),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) !!}
                    @if (isset($brand))
                        @method('PATCH')
                    @endif
                    <div class="form-group">
                        {{ Form::label('brandName', 'Brand Name') }}
                        @php
                            if (isset($brand)) {
                                $brandName = $brand->brand_name;
                            } else {
                                $brandName = null;
                            }
                        @endphp
                        {!! Form::text('brandName', $brandName, ['class' => 'form-control']) !!}
                        <p class="text-danger">
                            @error('brandName')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('brandLogo', 'Brand Logo') }}
                        {!! Form::file('brandLogo', ['class' => 'form-control']) !!}
                        <p class="text-danger">
                            @error('brandLogo')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    {!! Form::submit('Create', [
                        'class' => 'btn btn-primary text-light',
                    ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection()
