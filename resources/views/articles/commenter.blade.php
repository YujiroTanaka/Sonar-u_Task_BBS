<div class="form-group">
		<label for="commenter" class="">名前</label>
		<div class="">
			{{ Form::text('commenter', null, array('class' => '')) }}
		</div>
	</div>

	<div class="form-group">
		<label for="comment" class="">コメント</label>
		<div class="">
			{{ Form::textarea('comment', null, array('class' => '')) }}
		</div>
	</div>

	{{ Form::hidden('post_id', $post->id) }}

	<div class="form-group">
		<button type="submit" class="btn btn-primary">投稿する</button>
	</div>
