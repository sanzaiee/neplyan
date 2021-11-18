@if (session('success'))
                        <div class="alert alert-success" id="success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
@if (session('warning'))
    <div class="alert alert-danger" id="warning" role="alert">
        {{ session('warning') }}
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger" id="danger" role="alert">
        {{ session('danger') }}
    </div>
@endif

@if (session('error'))
   <div class="alert alert-danger" id="error" role="alert">
      {{ session('error') }}
    </div>
@endif

@if($errors->any())
	<div class="alert alert-danger">
		<ul class="list-unstyled">
			@foreach($errors->all() as $error)
				<li>  {{ $error }}  </li>
			@endforeach
		 </ul>
	</div>
@endif
