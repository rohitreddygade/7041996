@extends('layouts.main')
@section('title')Home
@stop
@section('links')
	{{HTML::style('public_assets/index.css')}}
  {{HTML::style('dist/components/header.min.css')}}
@stop
@section('page-title')<center><h1>Home Page</h1></center>
@stop
@section('content')
<div id="titulo">
		<p id="header">BackBenchs</p>
		<p id="subheader">A New way for Group Study</p>	
	</div>
 <div class="ui two column center aligned stackable doubling grid">
<div class="column">
  <div class="ui shape">
    <div class="sides">
      <div class="active side">
        <img src="/images/wireframe/image.png" class="ui medium image">
      </div>
      <div class="side">
        <img src="/images/wireframe/image-text.png" class="ui medium image">
      </div>
    </div>
  </div>
   <div class="ui ignored hidden divider"></div>
   <div class="ui ignored icon direction buttons">
    <div class="ui button" data-animation="flip" title="Flip Left" data-direction="left"><i class="left long arrow icon"></i></div>
    <div class="ui button" data-animation="flip" title="Flip Up" data-direction="up"><i class="up long arrow icon"></i></div>
    <div class="ui icon button" data-animation="flip" title="Flip Down" data-direction="down"><i class="down long arrow icon"></i></div>
    <div class="ui icon button" data-animation="flip" title="Flip Right" data-direction="right"><i class="right long arrow icon"></i></div>
  </div>
   <div class="ui ignored icon direction buttons">
    <div class="ui button" title="Flip Over" data-animation="flip" data-direction="over"><i class="retweet icon"></i></div>
    <div class="ui button" title="Flip Back" data-animation="flip" data-direction="back"><i class="flipped retweet icon"></i></div>
  </div>
</div>
<div class="column">
  <div class="ui cube shape">
    <div class="sides">
      <div class="active side">
        <div class="content">
          <div class="center">
            1
          </div>
        </div>
      </div>
      <div class="side">
        <div class="content">
          <div class="center">
            2
          </div>
        </div>
      </div>
      <div class="side">
        <div class="content">
          <div class="center">
            3
          </div>
        </div>
      </div>
      <div class="side">
        <div class="content">
          <div class="center">
            4
          </div>
        </div>
      </div>
      <div class="side">
        <div class="content">
          <div class="center">
            5
          </div>
        </div>
      </div>
      <div class="side">
        <div class="content">
          <div class="center">
            6
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="ui ignored hidden divider"></div>
   <div class="ui ignored icon direction buttons">
    <div class="ui button" data-animation="flip" title="Flip Left" data-direction="left"><i class="left long arrow icon"></i></div>
    <div class="ui button" data-animation="flip" title="Flip Up" data-direction="up"><i class="up long arrow icon"></i></div>
    <div class="ui icon button" data-animation="flip" title="Flip Down" data-direction="down"><i class="down long arrow icon"></i></div>
    <div class="ui icon button" data-animation="flip" title="Flip Right" data-direction="right"><i class="right long arrow icon"></i></div>
  </div>
  <div class="ui ignored icon direction buttons">
    <div class="ui button" title="Flip Over" data-animation="flip" data-direction="over"><i class="retweet icon"></i></div>
    <div class="ui button" title="Flip Back" data-animation="flip" data-direction="back"><i class="flipped retweet icon"></i></div>
  </div>
</div>
<div class="sixteen wide left aligned column">
  <div class="ui text shape">
    <div class="sides">
      <div class="active ui header side">Did you know? This side starts visible.</div>
      <div class="ui header side">Help, its another side!</div>
      <div class="ui header side">This is the last side</div>
    </div>
  </div>
   <div class="ui ignored hidden divider"></div>
   <div class="ui ignored icon direction buttons">
    <div class="ui button" data-animation="flip" title="Flip Left" data-direction="left"><i class="left long arrow icon"></i></div>
    <div class="ui button" data-animation="flip" title="Flip Up" data-direction="up"><i class="up long arrow icon"></i></div>
    <div class="ui icon button" data-animation="flip" title="Flip Down" data-direction="down"><i class="down long arrow icon"></i></div>
    <div class="ui icon button" data-animation="flip" title="Flip Right" data-direction="right"><i class="right long arrow icon"></i></div>
  </div>
  <div class="ui ignored icon direction buttons">
    <div class="ui button" title="Flip Over" data-animation="flip" data-direction="over"><i class="retweet icon"></i></div>
    <div class="ui button" title="Flip Back" data-animation="flip" data-direction="back"><i class="flipped retweet icon"></i></div>
  </div>
 </div>
  </div>
</div>
<script type="text/javascript">
$(document)
  .ready(function() {
 var
  $demo            = $('.shape.demos .ui.shape'),
  $directionButton = $('.shape.demos .direction .button'),
  handler
;
 // event handlers
handler = {
  rotate: function() {
    var
      $shape    = $(this).closest('.buttons').prevAll('.ui.shape').eq(0),
      direction = $(this).data('direction') || false,
      animation = $(this).data('animation') || false
    ;
    if(direction && animation) {
      $shape
        .shape(animation + '.' + direction)
      ;
    }
  }
};
 // attach events
$demo
  .shape()
;
$directionButton
  .on('click', handler.rotate)
  .popup({
    position  : 'bottom center'
  })
;
  })
;
</script>
@stop