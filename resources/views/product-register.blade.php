@extends('layout.main')
@section('main-section')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    {!! Form::open([
                        'url' => url($url),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) !!}
                    @if (isset($product))
                        @method('PATCH')
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('productName', 'Product Name') }}
                                @php
                                    if (isset($product)) {
                                        $productName = $product->product_name;
                                    } else {
                                        $productName = null;
                                    }
                                @endphp
                                {!! Form::text('productName', $productName, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('productName')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('imei_1', 'Imei 1') }}
                                @php
                                    if (isset($product)) {
                                        $imei_1 = $product->imei_1;
                                    } else {
                                        $imei_1 = null;
                                    }
                                @endphp
                                {!! Form::text('imei_1', $imei_1, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('imei_1')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('imei_2', 'Imei 2') }}
                                @php
                                    if (isset($product)) {
                                        $imei_2 = $product->imei_2;
                                    } else {
                                        $imei_2 = null;
                                    }
                                @endphp
                                {!! Form::text('imei_2', $imei_2, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('imei_2')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('model_no', 'model_no') }}
                                @php
                                    if (isset($product)) {
                                        $model_no = $product->model_no;
                                    } else {
                                        $model_no = null;
                                    }
                                @endphp
                                {!! Form::text('model_no', $model_no, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('model_no')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('product_code', 'product_code') }}
                                @php
                                    if (isset($product)) {
                                        $product_code = $product->product_code;
                                    } else {
                                        $product_code = null;
                                    }
                                @endphp
                                {!! Form::text('product_code', $product_code, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('product_code')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('qty', 'qty') }}
                                @php
                                    if (isset($product)) {
                                        $qty = $product->qty;
                                    } else {
                                        $qty = null;
                                    }
                                @endphp
                                {!! Form::text('qty', $qty, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('qty')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('price', 'price') }}
                                @php
                                    if (isset($product)) {
                                        $price = $product->price;
                                    } else {
                                        $price = null;
                                    }
                                @endphp
                                {!! Form::text('price', $price, ['class' => 'form-control input-rounded']) !!}
                                <p class="text-danger">
                                    @error('qty')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('productImage', 'Product Image') }}
                                @php
                                    if (isset($product)) {
                                        $productName = $product->product_name;
                                    } else {
                                        $productName = null;
                                    }
                                @endphp
                                {!! Form::file('productImage', ['class' => 'form-control ', 'id' => 'product_image']) !!}
                                <p class="text-danger">
                                    @error('productImage')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('details', 'details') }}
                                @php
                                    if (isset($product)) {
                                        $details = $product->details;
                                    } else {
                                        $details = null;
                                    }
                                @endphp
                                {!! Form::textarea('details', $details, ['class' => 'form-control ', 'rows' => '10']) !!}
                                <p class="text-danger">
                                    @error('details')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('brand_id', 'Select Brand') }}
                                <select class="custom-select" name="brand_id" id="brand_id">
                                    <option value=""> -- select --</option>
                                    @foreach ($brands as $brand)
                                        <option
                                            @if (isset($product)) @if ($product->brand_id == $brand->id) {{ 'selected' }} @endif
                                            @endif
                                            value="{{ $brand->id }}">
                                            {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">
                                    @error('brand_id')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    {!! Form::submit('Create', [
                        'class' => 'btn btn-primary',
                    ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
