@extends('layout.main')
@section('main-section')
    <div class="row">
        <div class="text-right">
            @if (session()->has('flashMessage'))
                <div class="alert-items">
                    <div class="alert alert-success mt-2" role="alert">
                        <h6> {{ session('flashMessage') }}</h6>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-12 my-3">
            <a class="p-2 rounded bg-secondary  float-right d-flex text-white"
                href="{{ route('dashboard.brand.trashes') }}">Trashes</a>
            <a class="p-2 rounded bg-primary mr-1 float-right d-flex text-white"
                href="{{ route('dashboard.brands.create') }}">Create
                brand</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="table-responsive"> --}}
                    <table class="table table-bordered text-center" id="dataTable4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Type</th>
                                <th scope="col">Brand Logo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($brands as $brand)
                                <tr class="">
                                    <td scope="row">{{ $i++ }}</td>
                                    <td>{{ $brand->brand_name }}</td>

                                    <td><img style="max-width:150px" src="{{ asset('uploads') }}/{{ $brand->brand_logo }}"
                                            alt="">
                                    </td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <p class="bg-success p-1 text-light rounded d-inline-block">{{ 'active' }}
                                            </p>
                                        @else
                                            <p class="bg-warning p-1 text-light rounded d-inline-block">{{ 'inactive' }}
                                            </p>
                                        @endif

                                    </td>
                                    <td class="" style="">
                                        <a style="font-size:18px;display:inline-block;padding:10px 16px"
                                            class=" rounded bg-primary text-light"
                                            href="{{ route('dashboard.brands.edit', ['brand' => $brand->id]) }}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></a>

                                        {!! Form::open([
                                            'url' => route('dashboard.brands.destroy', ['brand' => $brand->id]),
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
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
