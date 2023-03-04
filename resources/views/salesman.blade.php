@extends('layout.main')
@section('main-section')
    <div class="row">
        @if (session()->has('flashMessage'))
            <div class="alert-items">
                <div class="alert alert-success mt-2" role="alert">
                    <strong>Well done!</strong> {{ session('flashMessage') }}
                </div>
            </div>
        @endif
        <div class="col-md-12 my-3">
            <a class="p-2 rounded bg-primary float-right d-flex text-white"
                href="{{ route('dashboard.salesman.create') }}">Create
                salesman</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <h4 class="header-title">All salesman</h4>
                        <div class="data-tables ">
                            <table class=" table-bordered text-center" id="dataTable4">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($salesmen as $salesman)
                                        <tr class="">
                                            <td scope="row">{{ $i++ }}</td>
                                            <td>{{ $salesman->name }}</td>
                                            <td>{{ $salesman->mobile }}</td>
                                            <td>{{ $salesman->email }}</td>
                                            <td>
                                                {{ $salesman->address }}
                                            </td>
                                            <td>
                                                @if ($salesman->status == '1')
                                                    <p class="p-1 bg-success rounded text-light">{{ 'active' }}</p>
                                                @elseif($salesman->status == '0')
                                                    <p class="p-1 bg-warning rounded text-dark">{{ 'inactive' }}</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a style="font-size:18px;display:inline-block;padding:9px 16px"
                                                    class=" rounded bg-primary text-light"
                                                    href="{{ route('dashboard.salesman.edit', ['salesman' => $salesman->id]) }}"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a>

                                                {!! Form::open([
                                                    'url' => route('dashboard.salesman.destroy', ['salesman' => $salesman->id]),
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
    </div>
@endsection
