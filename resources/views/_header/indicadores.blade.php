<?php /*  ?>
@foreach( Session::get('usuario')->getTrimestre() as $trimestre)
    <div class="col-md-3 text-center">
        <a href="/trimestre?t={!! $trimestre->trimestre !!}">
            {!! $trimestre->trimestre !!}
            <br/>
            {!! $trimestre->total !!}
        </a>
        <span class="glyphicon glyphicon-question-sign" data-toggle="modal"
              data-target="#myModalTrimestre" aria-hidden="true"></span>
    </div>
@endforeach

@if( isset($tendencia) && $tendencia )
    <div class="col-md-3 text-center">
        <a href="">
            Tendência de vendas
            <br>
            {!! $tendencia !!}
        </a>
        <span class="glyphicon glyphicon-question-sign" data-toggle="modal"
              data-target="#myModalTendencia" aria-hidden="true"></span>
    </div>
@endif
 <?php */ ?>