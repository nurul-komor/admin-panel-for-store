@extends('layout.main')
@section('main-section')
    <div class="row">
        @if (session()->has('flashMessage'))
            <div class="alert alert-success mt-2" role="alert">
                <h6> {{ session('flashMessage') }}</h6>
            </div>
        @endif
        <div class="col-md-12 my-3">
            <a class="p-2 rounded bg-primary float-right d-flex text-white" href="{{ route('dashboard.products.index') }}">All
                Product</a>
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
                                @foreach ($trashes as $trash)
                                    <tr class="">
                                        <td scope="row">{{ $i++ }}</td>
                                        <td>{{ $trash->product_name }}</td>
                                        <td>{{ $trash->imei_1 }}</td>
                                        <td>{{ $trash->imei_2 }}</td>
                                        <td>{{ $trash->model_no }}</td>
                                        <td>{{ $trash->product_code }}</td>
                                        <td>{{ $trash->qty }}</td>
                                        <td>{{ $trash->price }}$</td>
                                        <td>
                                            <p class="bg-warning p-1 text-light rounded d-inline-block">
                                                {{ 'inactive' }}
                                            </p>
                                        </td>

                                        <td><img style="max-height:150px;max-width:150px"
                                                src="{{ asset('uploads') }}/{{ $trash->product_image }}" alt="">
                                        </td>
                                        <td>{{ $trash->getBrand->brand_name }}</td>
                                        <td><img style="max-height:150px;max-width:150px"
                                                src="{{ asset('uploads') }}/{{ $trash->getBrand->brand_logo }}"
                                                alt=""></td>
                                        <td>
                                            <p style="max-width:300px">{{ $trash->details }}</p>
                                        </td>
                                        <td class="" style="">
                                            <a style=";display:inline-block;padding:10px 16px"
                                                class=" rounded bg-primary text-light"
                                                href="{{ route('dashboard.product.restore', ['product' => $trash->id]) }}">Restore</a>
                                            <a style="display:inline-block;padding:10px 16px"
                                                class=" rounded bg-danger text-light"
                                                href="{{ route('dashboard.product.forceDelete', ['product' => $trash->id]) }}">Force
                                                Delete</a>
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
