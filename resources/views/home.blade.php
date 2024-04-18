@extends('layouts.app')

@section('content')
<div class="container">
<style>
#leftbox {
            float: left;
            width: 25%;
        }
 
        #middlebox {
            float: left;
            width: 50%;
            border-left: 1px solid green;
            height: 500px;
           
        }
/* Blue */
.info {
  border-color: #2196F3;
  color: dodgerblue
}

.info:hover {
  background: #2196F3;
  color: white;
}

/* Orange */
.warning {
  border-color: #ff9800;
  color: orange;
}

.warning:hover {
  background: #ff9800;
  color: white;
}
</style>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('User Profile') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- <h3>User Dashboard</h3> -->
                    <!-- {{ __('You are logged in!') }} -->
                    <div id="leftbox">
                                    <a href="{{ route('login') }}">
                                        <button class="btn info" style='margin-right:16px'>Profile Page</button>
                                    </a>
                                    <a href="{{ route('changePassword') }}">
                                        <button class="btn warning" style='margin-right:16px' >Password Change</button>
                                    </a>
                                    
                                </div>
                    <div  id="middlebox"> 
                        <table align="center">
                            <tr>
                                <td align="left"><b>First Name: </b></td>
                                <td> </td>
                                <td align="left">{{(Auth::user()->name)}}</td>
                            </tr>
                            <tr>
                                <td align="left"><b>Last Name: </b></td>
                                <td> </td>
                                <td align="left">{{(Auth::user()->last_name)}}</td>
                            </tr>
                            <tr>
                                <td align="left"><b>Address: </b></td>
                                <td> </td>
                                <td align="left">{{(Auth::user()->address)}}:</td>                               
                            </tr>
                            <tr>
                                <td align="left"><b>Phone: </b></td>
                                <td> </td>
                                <td align="left">{{(Auth::user()->phone)}}</td>
                            </tr>
                            <tr>
                                <td align="left"><b>Email: </b></td>
                                <td> </td>
                                <td align="left">{{(Auth::user()->email)}}</td>
                            </tr>
                            <tr>
                                <td align="left"><b>Birthdate: </b></td>
                                <td> </td>
                                <td align="left">{{date_format(Auth::user()->dob,"d-m-Y")}}</td>
                            </tr>
                            <tr>
                                <td align="left"><b>ID Verification: </b></td>
                                <td> </td>
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <td align="left"> <a href= "{{ route('download-file') }}" class="underline"> Download ID </a> <i class="fa fa-file-pdf-o" style="font-size:24px;color:red"></i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
