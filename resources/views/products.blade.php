@extends('layout.main')
@section('main-section')
    <div class="row">
        @if (session()->has('flashMessage'))
            <div class="alert alert-success mt-2" role="alert">
                <h6> {{ session('flashMessage') }}</h6>
            </div>
        @endif
        <div class="col-md-12 my-3">
            <a class="p-2 rounded bg-primary float-right d-flex text-white"
                href="{{ route('dashboard.products.create') }}">Create
                product</a>
            <a class="p-2 rounded bg-secondary mr-1 float-right d-flex text-white"
                href="{{ route('dashboard.product.trashes') }}">Trash</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All Products</h4>
                    <div class="data-tables ">
                        <table class=" table-bordered text-center" id="dataTable4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">product_name</th>
                                    <th scope="col">imei_1</th>
                                    <th scope="col">imei_2</th>
                                    <th scope="col">model_no</th>
                                    <th scope="col">product_code</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Product image</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Logo</th>
                                    <th scope="col">Product Details</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr class="">
                                        <td scope="row">{{ $i++ }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->imei_1 }}</td>
                                        <td>{{ $product->imei_2 }}</td>
                                        <td>{{ $product->model_no }}</td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->price }}$</td>
                                        <td>
                                            @if ($product->status == 1)
                                                <p class="bg-success p-1 text-light rounded d-inline-block">
                                                    {{ 'active' }}
                                                </p>
                                            @else
                                                <p class="bg-warning p-1 text-light rounded d-inline-block">
                                                    {{ 'inactive' }}
                                                </p>
                                            @endif

                                        </td>

                                        <td><img style="max-height:150px;max-width:150px"
                                                src="{{ asset('uploads') }}/{{ $product->product_image }}" alt="">
                                        </td>
                                        <td>{{ $product->getBrand->brand_name }}</td>
                                        <td><img style="max-height:150px;max-width:150px"
                                                src="{{ asset('uploads') }}/{{ $product->getBrand->brand_logo }}"
                                                alt=""></td>
                                        <td>
                                            <p style="max-width:300px">{{ $product->details }}</p>
                                        </td>
                                        <td class="" style="">
                                            <a style="font-size:18px;display:inline-block;padding:10px 16px"
                                                class=" rounded bg-secondary text-light"
                                                href="{{ route('dashboard.products.show', ['product' => $product->id]) }}"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>

                                            <a style="font-size:18px;display:inline-block;padding:10px 16px"
                                                class=" rounded bg-primary text-light"
                                                href="{{ route('dashboard.products.edit', ['product' => $product->id]) }}"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></a>

                                            {!! Form::open([
                                                'url' => route('dashboard.products.destroy', ['product' => $product->id]),
                                                'style' => 'display:inline-block;',
                                            ]) !!}
                                            @method('DELETE')
                                            {!! Form::button('<i style="font-size:18px" class="fa fa-trash" aria-hidden="true"></i>', [
                                                'class' => 'btn btn-danger ',
                                                'type' => 'submit',
                                                'style' => 'margin-bottom: 5px;',
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
