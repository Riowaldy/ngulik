<div class="panel panel-primary">
	@foreach ($obrolans3 as $obrolan)
	<ul class="list-group list-group-flush">
	    <li class="list-group-item">
	        <div class="panel-body">
	        	@if($obrolan->penerima == Auth::id())
	            <div class="col-md-6">
	                <label for="nama">{{ $obrolan->isipesan }}</label>
	            </div>
	            @else
	            <div class="col-md-6 col-md-offset-6">
	                <label for="nama">{{ $obrolan->isipesan }}</label>
	            </div>
	            @endif
	        </div>
	    </li>
	</ul>
	@endforeach
</div>
	