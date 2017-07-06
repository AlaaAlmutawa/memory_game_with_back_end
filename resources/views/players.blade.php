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
                            <ul class="nav">
                                <li><a href="players">View all players</a></li> <!-- these buttons are clickable and should align right-->
                                <li><a href="dashboard">Edit Options</a></li>
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!--wanna display all the users their times-->
                            <table class="table table-striped table-borders">
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
                                <?php $shares = 0?>
                                @if($players!=null)
                                    @foreach ($players as $player)
                                        <tr>
                                            <td>{{$player->first_name}}</td>
                                            <td>{{$player->last_name}}</td>
                                            <td>{{$player->email}}</td>
                                            <td>{{$player->phone_number}}</td>
                                            <td>{{$player->time_record}}</td>
                                            <td>{{$player->difficulty}}</td>
                                        </tr>
                                        @if($player->shared_fb==1)
                                            <?php $shares++;?>
                                        @endif
                                    @endforeach
                                @else
                                <tr>
                                        <td colspan="6">No player was found in the database</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 box">
                            <!--view how many shares-->
                            @if($shares>1)
                            <p> {{$shares}} Players Shared Their Results </p>
                            @else
                            <p>{{$shares}} Player Shared Their Results</p>
                            @endif
                        </div>
                        <div class="col-md-6 box">
                            <!--view how many clicks-->
                            @if($clicks!=null)
                                <p> {{$clicks}} Clicks on the Start Button</p>
                            @else
                                <p>No Clicks the Start Button</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/jquery-1.12.3.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/jquery.validate.min.js"></script>
    <script src="/js/admin_script.js" type="text/javascript"></script>
@stop