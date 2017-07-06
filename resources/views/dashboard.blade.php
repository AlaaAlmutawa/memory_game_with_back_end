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
                                                        <li><a href="#" class="difficulty-toggle" data-id="easy">EASY</a> |</li> <!--remove the id from the li accordingly-->
                                                        <li><a href="#" class="difficulty-toggle" data-id="medium">MEDIUM</a> |</li>
                                                        <li><a href="#" class="difficulty-toggle" data-id="hard">HARD</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="edit-admin hidden">
                                                    {!! Form::open(['url'=> 'edit-options', 'method' => 'post', 'id'=>'edit-difficulty']) !!}
                                                    <h3>
                                                        Edit Level Option: <span id="edit-level-option"></span>
                                                    </h3>
                                                    <input type="hidden" id="difficulty-level" name="difficulty" value="">
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
                                                <div class="thank-you hidden">
                                                    <h4>
                                                        Game Options have been editted.. Thank you :). 
                                                    </h4>
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
    <script src="/vendor/jquery-1.12.3.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/jquery.validate.min.js"></script>
    <script src="/js/admin_script.js" type="text/javascript"></script>
@stop