@extends('layout.main')
@section('main-section')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('flashMessage'))
                <div class="alert alert-items">
                    <div class="alert alert-success mt-2" role="alert">
                        <h6> {{ session('flashMessage') }}</h6>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-12 my-3">

            <a class="p-2 rounded bg-primary mr-1 float-right d-flex text-white"
                href="{{ route('dashboard.brands.index') }}">All
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
                            @foreach ($trashes as $trash)
                                <tr class="">
                                    <td scope="row">{{ $i++ }}</td>
                                    <td>{{ $trash->brand_name }}</td>

                                    <td><img style="max-width: 150px" src="{{ asset('uploads') }}/{{ $trash->brand_logo }}"
                                            alt="">
                                    </td>
                                    <td>
                                        <p class="bg-warning p-1 text-dark rounded d-inline-block">{{ 'inactive' }}
                                        </p>
                                    </td>
                                    <td class="" style="">
                                        <a style=";display:inline-block;padding:10px 16px"
                                            class=" rounded bg-primary text-light"
                                            href="{{ route('dashboard.brand.restore', ['brand' => $trash->id]) }}">Restore</a>
                                        <a style="display:inline-block;padding:10px 16px"
                                            class=" rounded bg-danger text-light"
                                            href="{{ route('dashboard.brand.forceDelete', ['brand' => $trash->id]) }}">Force
                                            Delete</a>
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
