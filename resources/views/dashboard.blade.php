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
                                                <h2>
                                                    <span class="large text-green">Admin Dashboard </span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="difficulties">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                                    <p>Pick a difficulty option to edit</p>
                                                    <ul>
                                                        <li><a href="#" id="easy">EASY</a> |</li> <!--remove the id from the li accordingly-->
                                                        <li><a href="#" id="medium">MEDIUM</a> |</li>
                                                        <li><a href="#" id="hard">HARD</a></li>
                                                    </ul>
                                                </div>
                                                <div class="popup hidden">
                                                    {!! Form::open(['url'=> 'dashboard', 'method' => 'post']) !!}
                                                        <h3 id="edit-level-option">
                                                            Edit Level Option:
                                                        </h3>
                                                    <input type="hidden" name="difficulty" value="">
                                                    <div class="form-group">
                                                            <label for="cols">Number of Columns*:</label>
                                                            <input type="number" class="form-control" id="cols" name="cols">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rows">Number of Rows*:</label>
                                                            <input type="number" class="form-control" id="rows" name="rows">
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>

        </div>
    </div>
@stop