<?php
use Spatie\Analytics\Period;
use Carbon\Carbon;

function fileName($file)
{
	$extension = $file->getClientOriginalName();
	$extension = collect(explode(".",  $extension))->last();
	return md5(date('d-m-Y h:i:s')).'.'.$extension;
}

