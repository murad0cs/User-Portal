@extends('layouts.app')

@section('content')
<div class="container">
<style>
table, td, th {
  border: 1px solid green;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  text-align: center;
  background: lightgrey;
}
td {
  text-align: center;
}
</style>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style> 
        input[type=text] {
        width: 50%;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><a style="color:#0000FF;" href= "{{ route('admin.home') }}"><strong> {{ __('User List') }} </strong></a> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- <h3>Admin Dashboard</h3>
                        {{ __('You are logged in!') }} -->
                        <form class="example" action="{{ route ('search_data')}}" method="Get" style="margin:auto;max-width:300px">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <br>
                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th align="center"> </th>
                                <th>Address</th>
                                <th align="center"> </th>
                                <th>Phone</th>
                                <th align="center"> </th>
                                <th>Email</th>
                                <th> </th>
                                <th>DOB</th>
                                <th align="center"> </th>
                                <th>ID Verification</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $users)
                                <tr class="dd">
                                    <td >{{$users->name}} {{$users->last_name}} </td>
                                    <td> </td>
                                    <td style="padding:0 15px 0 15px;">{{$users->address}} </td>
                                    <td> </td>
                                    <td style="padding:0 15px 0 15px;">{{$users->phone}} </td>
                                    <td> </td>
                                    <td style="padding:0 15px 0 15px;">{{$users->email}} </td>
                                    <td> </td>
                                    <td style="padding:0 15px 0 15px;">{{date_format($users->dob,"d-m-Y")}} </td>
                                    <td> </td>
                                    
                                        <meta name="viewport" content="width=device-width, initial-scale=1">
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                    <td align="center"> <a href= "{{ route('downloadFileList',$users->id) }}" class="underline" id="file_up">{{$users->id}}</a> <i class="fa fa-file-pdf-o" style="font-size:24px;color:red"></i></td>
                                    <td>
                                    @error('file_up')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                            {{$user->onEachSide(1)->links()}}
                        
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
