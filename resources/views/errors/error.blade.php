
@if(sizeof($errors)>0)

<div class="alert alert-danger">
	<button tupe="button" class="close" data-dismiss="alert" aria_hidden="true">&times;</button>
	<strong>Algo salió mal</strong>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>

@endif
