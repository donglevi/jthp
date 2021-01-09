@extends('master')
@section('title','Sửa câu hỏi')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">note_add</i> Sửa câu hỏi</h2>
		</div>
		<div class="body">
			<form action="" method="POST" accept-charset="utf-8">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="form-group form-float textarea" style="height: 65px;">
						    <div class="form-line">
						    	<textarea rows="4" cols="50"  class="form-control no-resize" name="question" required>{{ $question->question}}</textarea>
						        <label class="form-label">Câu hỏi</label>
						    </div>
	                        @if($errors->has('question'))
	                            <em style="color:red">{{$errors->first('question')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group form-float textarea" style="height: 65px;">
						    <div class="form-line">
						    	<textarea rows="3" cols="50"  class="form-control no-resize" name="plan1">{{ $question->plan1}}</textarea>
						        <label class="form-label">Đáp án 1</label>
						    </div>
	                        @if($errors->has('plan1'))
	                            <em style="color:red">{{$errors->first('plan1')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group form-float textarea" style="height: 65px;">
						    <div class="form-line">
						    	<textarea rows="3" cols="50"  class="form-control no-resize" name="plan2">{{ $question->plan2}}</textarea>
						        <label class="form-label">Đáp án 2</label>
						    </div>
	                        @if($errors->has('plan2'))
	                            <em style="color:red">{{$errors->first('plan2')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group form-float textarea" style="height: 65px;">
						    <div class="form-line">
						    	<textarea rows="3" cols="50"  class="form-control no-resize" name="plan3">{{ $question->plan3}}</textarea>
						        <label class="form-label">Đáp án 3</label>
						    </div>
	                        @if($errors->has('plan3'))
	                            <em style="color:red">{{$errors->first('plan3')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group form-float textarea" style="height: 65px;">
						    <div class="form-line">
						    	<textarea rows="3" cols="50"  class="form-control no-resize" name="plan4">{{ $question->plan4}}</textarea>
						        <label class="form-label">Đáp án 4</label>
						    </div>
	                        @if($errors->has('plan4'))
	                            <em style="color:red">{{$errors->first('plan4')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-5 col-xs-12">
				        <div class="form-group">
				        	<label class="form-label">Câu trả lời</label>
				            <div class="form-line">
		                   		<select class="form-control show-tick" name="answer" required>
		                   			<option value="">-- Please select --</option>
			                        <option value="plan1" @if ($question->answer == 'plan1') selected @endif>Đáp án 1</option>
			                        <option value="plan2" @if ($question->answer == 'plan2') selected @endif>Đáp án 2</option>
			                        <option value="plan3" @if ($question->answer == 'plan3') selected @endif>Đáp án 3</option>
			                        <option value="plan4" @if ($question->answer == 'plan4') selected @endif>Đáp án 4</option>
		                        </select>
		                        @if($errors->has('answer'))
		                            <em style="color:red">{{$errors->first('answer')}}</em>
		                        @endif
				            </div>
						</div>
					</div>

				</div>
				{!! csrf_field() !!}
				<div class="form-group m-t-15">
					<button class="btn btn-primary waves-effect" type="submit">Hoàn tất</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')

