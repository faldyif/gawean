<?php $auther = DB::table('users')->where('name', 'Faldy Ikhwan Fadila')->first();
	echo $auther->name;
?>