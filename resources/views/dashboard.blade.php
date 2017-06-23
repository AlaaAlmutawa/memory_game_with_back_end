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
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="edit-admin">
                                                    {!! Form::open(['url'=> 'edit-options', 'method' => 'post', 'id'=>'edit-difficulty']) !!}
                                                    <h3>
                                                        Edit Level Option: <span id="edit-level-option"></span>
                                                    </h3>
                                                    <input type="hidden" id="difficulty" name="difficulty" value="">
                                                    <div class="form-group">
                                                        <label for="cols">Number of Columns*:</label>
                                                        <input type="number" class="form-control" id="cols" name="cols">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rows">Number of Rows*:</label>
                                                        <input type="number" class="form-control" id="rows" name="rows">
                                                    </div>
                                                    <button type="submit">Submit Changes</button>
                                                    {!! Form::close() !!}
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