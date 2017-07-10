@extends('master')
@section('content')
    <div class="container relative">
        <img class="left" src="/images/background-left.png">
        <img class="right" src="/images/background-right.png">
        <div class="row">
            <div class="col-md-9 col-centered box">
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
                                    <div class="text">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    Congratulations!<br/>
                                                </p>
                                                <p class="small">
                                                    Your Scores Have Been Uploaded And You Are Now A Registered Participant.</p>
                                                <p class="middle">
                                                    Have The Chance To Win One Of Our Amazing Weekly Prizes!!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-3">
                            <div class="">
                                <img class="img-center" src="/images/congratulations-image.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="game">
                        <div class="row">
                            <div class="col-md-8 text-align-right">
                                <a href="/" class="play-again">PLAY AGAIN</a>
                            </div>
                            <div class="col-md-4">
                                <div class="text without-padding">
                                    <p class="small">
                                        Click Here to Play Again &
                                    </p>
                                    <p class="middle">
                                        RAISE YOUR SCORE!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text without-padding">
                            <div class="col-md-8">
                                <a class="fb-icon">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <div    class="text without-padding">
                                    {!! Form::open(['url'=> 'share', 'method' => 'post']) !!}
                                    <input type="hidden" id="user_id" name="user_id" value="{{$user_id}}">
                                    <button type="submit" id="fb" class="post-ajax-request">
                                    <a class="small">
                                        Click Here to Share Your
                                    </a><br/>
                                    <a class="fb-text">
                                        Scores On Facebook!
                                    </a>
                                    </button>
                                    {!! Form::close() !!}
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

@stop
