<div class="row">
    <div class="col-md-12">
        <span class="title">Our Top</span><span class="orange">10</span>
    </div>
</div>
@foreach($players as $player)
<div class="row">
    <div class="col-md-12">
        <div class="user">
            <p>{{$player->first_name}} {{$player->last_name}}<br/>
                <span class="time">{{$player->time_record}}</span><br/>
            </p>
        </div>
    </div>
</div>
@endforeach