<?php
// find by id on db mongo
DB::find( 'users', 12, 'mongo' );

// alternative syntax using shortcut selector
DB('mongo')->find( 'users', 12 );

// get the first
DB::first( 'users' )
	->where('keks', '!=', 'bla')
	->as_object()
	->run();

// get the last
DB::last( 'users' )->where( 'deleted', 0 )->run();

// get only the email
DB::column( 'users', 'email' )->find( 12 )->run();

// count
DB::count( 'users' )->where( 'age', 18 )->run();

// count 
DB::count( 'users' )->where( 'age', '>=', 18 )->run();

// select
DB::select( 'users' )
	->where( 'age', '>', 21 )
	->and_where( 'age', '<', 30 )
	->limit(10)
	->run();

// limit and offset
DB::select( 'users', array( 'name', 'email' ) )
	->limit( 30 )
	->offset( 60 )
	->run();

// in array
DB::select( 'users', array( 'name', 'email' ) )
	->where( 'id', 'in', array( 2, 35, 56 ) )
	->run();

// pagination
DB::select( 'users', array( 'name', 'email' ) )
	->page( 2, 30 ) // page 2 with page size 30
	->order_by( 'name', 'asc' )
	->run();

// get result as object
DB::select_object()



