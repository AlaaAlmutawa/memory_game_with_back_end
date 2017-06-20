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
                            <a class="start" id="start-btn">START</a>
                            <p class="timer hidden" id="timer" ></p>
                        </div>
                    </div>
                </div>
                <div class="section relative">
                    <div class="row">
                        <div class="popup hidden">
                            <!--we should create a hidden form here that would show after the game is over-->
                            <form method="post" action="/congratulations.php" id="register-form">
                                <h1>Your Time: </h1>
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
                                    <input type="text" class="form-control" id="phone_number">
                                </div>
                                <button type="submit" id="submit_score">Submit Score</button>
                            </form>
                        </div>
                        <div class="col-md-3 without-padding"> <!--topten-->
                            <div class="top-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="title">Our Top</span><span class="orange">10</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Maysam Missaki<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Mohamad Mustafa<br/>
                                                <span class="time">00:03:04</span><br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Nadine Al Sami<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Sarah Abou Ali<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Dima Falamanki<br/>
                                                <span class="time">00:03:04</span>
                                                <br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Daniel Drennan<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Samar Shidiak<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Randa Abou El Hoson<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <p>Christine Salhoub<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user without-border">
                                            <p>Jack Shbaro<br/>
                                                <span class="time">00:03:04</span><br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9"> <!--game-->
                            <div class="game">
                                <div class="row">
                                    <div class="col-md-12 without-padding">
                                        <div class="game-container">
                                            <!--the circles and squares-->
                                            <div class="disks">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                        <div class="disk">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
