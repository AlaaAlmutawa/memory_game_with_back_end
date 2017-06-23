@extends('master')
@section('content')
    <div class="container relative">
        <img class="left" src="/images/background-left.png">
        <img class="right" src="/images/background-right.png">
        <div class="row">
            <div class="col-md-9 col-xs-12 col-centered box">
                <div class="section">
                    <div class="row">
                        <div class="col-md-12">
                            <!--wanna display all the users their times-->
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Time Record</th>
                                    <th>Difficulty</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($players as $player)
                                        <tr>
                                            <td>{{$player->first_name}}</td>
                                            <td>{{$player->last_name}}</td>
                                            <td>{{$player->email}}</td>
                                            <td>{{$player->phone_number}}</td>
                                            <td>{{$player->time_record}}</td>
                                            <td>{{$player->difficulty}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!--view how many shares-->
                        </div>
                        <div class="col-md-6">
                            <!--view how many clicks-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop