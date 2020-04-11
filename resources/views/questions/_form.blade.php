@csrf
<div class="form-group">
	<label for="question-title">Question Title</label>
	<input type="text" name="title" value="{{ old('title', $question->title) }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " id="questioin-title">
	@if($errors->has('title'))
		<div class="invlid-feedback">
			<strong>{{ $errors->first('title') }}</strong>
		</div>
	@endif
</div>
<div class="form-group">
	<label for="question-body">Explain your question</label>
	<textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }} " id="questioin-body" rows="10">{{ old('body', $question->body) }}</textarea>
	@if($errors->has('body'))
		<div class="invlid-feedback">
			<strong>{{ $errors->first('body') }}</strong>
		</div>
	@endif
</div>
<div class="form-group">
	<button class="btn btn-lg btn-outline-primary">
		{{ $buttonText }}
	</button>
</div>