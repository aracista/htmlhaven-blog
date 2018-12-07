@extends('include.head')

@section('content')

<div class="container" style="margin-bottom: 10%;">
	<div class="text-center"><h1>KONTAK</h1></div>
	<hr>
	<div class="col-md-8 col-md-offset-2">
		<div class="well well-sm">
			<fieldset>
				<legend class="text-center">Kontak Kami</legend>
				<form action="" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Nama :</label>
						<div class="col-md-8">
						<input type="text" class="form-control" name="nama">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Email :</label>
						<div class="col-md-8">
						<input type="text" class="form-control" name="email">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pesan :</label>
						<div class="col-md-8">
						<textarea type="text" class="form-control" name="pesan" rows="5"></textarea>
						</div>
					</div>
					<div class="col-md-11 text-right">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</fieldset>
			
		</div>
	</div>
	
</div>
@endsection
