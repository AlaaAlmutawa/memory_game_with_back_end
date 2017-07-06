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
                            <div class="row">
                                <div class="col-sm-2 without-padding">
                                    <div class="sephora-logo">
                                        <div class="block">
                                        </div>
                                        <div class="block">
                                        </div>
                                        <div class="block">
                                        </div>
                                        <div class="block">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="top-text">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="before-game">
                                                    <span class="large text-green">Find the pairs of colors in the least clicks possible.</span><br/>
                                                    When the clicked selections are different, both will be covered again.<br/>
                                                    The less the clicks, the higher the score!
                                                </p>
                                                <p class="after-game hidden">
                                                    <span class="large text-purple">The more you play, the higher your score!!</span><br/>
                                                    <span class="bold">Enter your personal information to become a registered participant.
                                                        Already a player, just login to enter your new score.</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="difficulties">
                                                    <ul>
                                                        <li id="difficulty" value="easy"><a href="#" id="level-btn-easy">EASY</a> |</li> <!--remove the id from the li accordingly-->
                                                        <li value="medium"><a href="#" id="level-btn-medium">MEDIUM</a> |</li>
                                                        <li value="hard"><a href="#" id="level-btn-hard">HARD</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section game">
                    <div class="row">
                        <div class="col-md-6">
                            <!--words here-->
                            <p>
                                Keep an eye for these colors to<br/>
                                win fabulous SEPHORA products!!
                            </p>
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <!--button-->
                            {!! Form::open(['url'=> 'start-game', 'method' => 'post', 'id'=>'start']) !!}
                                <button type="submit" class="post-ajax-request start" id="start-btn">
                                    START
                                </button>
                            {!! Form::close() !!}
                            <p class="timer hidden" id="timer"></p>
                        </div>
                    </div>
                </div>
                <div class="section relative">
                    <div class="row">
                        <div class="popup hidden">
                            <!--we should create a hidden form here that would show after the game is over-->
                            {!! Form::open(['url'=> 'index', 'method' => 'post']) !!}
                                <h1>Your Time: </h1>
                                <div class="form-group">
                                    <input type="hidden" id="time_record" name="time_record" value="00:00:00">
                                    <input type="hidden" name="difficulty" value="easy">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name*: </label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name*: </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">email*: </label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone Number: </label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                                </div>
                                <button type="submit" id="submit_score">Submit Score</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-3 without-padding"> <!--topten-->
                            <div class="top-10">

                            </div>
                        </div>
                        <div class="col-md-9"> <!--game-->
                            <div class="game" id="game">

                            </div>
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
<script src="/js/web_script.js" type="text/javascript"></script>
<script src="/js/game_script.js" type="text/javascript"></script>
@stop
