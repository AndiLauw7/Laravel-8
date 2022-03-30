@extends('data.layout')
 
@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Laravel 9 CRUD School Application</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('data.create') }}"> Create New data</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>email</th>
            <th>x</th>
            <th>y</th>
            <th>w</th>
            <th>z</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->x }}</td>
            <td>{{ $d->y }}</td>
            <td>{{ $d->w }}</td>
            <td>{{ $d->z }}</td>
            <td>
                <form action="{{ route('data.destroy',$d->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('data.show',$d->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('data.edit',$d->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
       {!! $data->links() !!}
    </div>
      
@endsection