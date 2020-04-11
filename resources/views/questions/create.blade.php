@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h2>Ask Questions</h2>
						<div class="ml-auto">
							<a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Question</a>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<form action="{{ route('questions.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="question-title">Question Title</label>
							<input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " id="questioin-title">
							@if($errors->has('title'))
								<div class="invlid-feedback">
									<strong>{{ $errors->first('title') }}</strong>
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="question-body">Explain your question</label>
							<textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }} " id="questioin-body" rows="10"></textarea>
							@if($errors->has('body'))
								<div class="invlid-feedback">
									<strong>{{ $errors->first('body') }}</strong>
								</div>
							@endif
						</div>
						<div class="form-group">
							<button class="btn btn-lg btn-outline-primary">
								Ask this Question
							</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
