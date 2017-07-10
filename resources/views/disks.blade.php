<?php 
    if($gameOption->cols > 6){
        $disk = "small-disk";
    }else{
        $disk = "";
    }
     ?>
<div class="row">
    <div class="col-md-12 without-padding">
        <div class="game-container">
            <!--the circles and squares-->
            <div class="disks" id="disks_container">
                <input type="hidden" name="cols" value="{!! $gameOption->cols !!}" id ="cols_number">
                <input type="hidden" name="cols" value="{!! $gameOption->rows !!}" id ="rows_number">
            @for($i=0; $i<$gameOption->rows;$i++)
                <div class="row">
                    <div class="col-md-12">
                        @for($y=0; $y<$gameOption->cols;$y++)
                        <div class="{{$disk}} disk" id="disk">
                           <div class="front">

                            </div>
                            <div class="back">

                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
