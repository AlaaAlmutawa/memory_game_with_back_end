<div class="row">
    <div class="col-md-12 without-padding">
        <div class="game-container">
            <!--the circles and squares-->
            <div class="disks" id="disks_container">
                @for($i=0; $i<$gameOption->rows;$i++)
                <div class="row">
                    <div class="col-md-12">
                        @for($y=0; $y<$gameOption->cols;$y++)
                        <div class="disk">

                        </div>
                        @endfor
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
