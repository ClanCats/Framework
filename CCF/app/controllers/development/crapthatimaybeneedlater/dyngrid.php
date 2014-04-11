<?php
/*$grids = array(
	4,
	4,
	4,
	4,
	4,
	4,
	4,
	8,
	8,
	12,
	16,
);*/
/*
$grids = array(
	1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,
	2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
	3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,
	4,4,4,4,4,4,4,4,4,4,4,4,4,
	5,5,5,5,5,5,5,5,5,
	6,6,6,6,
	7,7,7,
	8,8,8,
	12,
	16,
);*/

$grids = array(
	2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
	4,4,4,4,4,4,4,4,
	8,8,8,8,
	12,12,
	16,
);

$data = array();
$count = 100;

for( $i=0;$i<50;$i++ ) {
	$data[] = array(
		'grid' => $grids[ array_rand( $grids ) ],
		'name' => 'item'.($i+1),
	);
}


$grid = array();
$sum = 0;
$i = 0;

$loop = 0;
$data_size = count( $data );

while( $loop < $data_size ) {

	if ( $sum <= 0 ) {
		$i++; //echo "using index: $i\n";
	}	
	
	$max = 16 - $sum; 
	//echo "maximal: $max möglich\n";
	
	$item = $data[$loop];
	//echo "aktuelles {$item['name']} hat: {$item['grid']}\n";
	
	if ( $item['grid'] > $max ) {
		
		$currkey = $loop;
		$curritem = $item;
	
		while( $curritem['grid'] > $max && $currkey < $data_size ) {
		
			$currkey++;
			if ( array_key_exists( $currkey, $data ) ) {
				$curritem = $data[$currkey]; //echo "trying next {$curritem['name']}: {$curritem['grid']}\n";
			}
		}
		 
		
		if ( array_key_exists( $currkey, $data ) ) {
			$data[$currkey] = $item; //echo "trhow old {$item['name']} {$item['grid']}\n";
			$item = $curritem;
		}
		
		$data = array_values( $data );
		
		//echo "-> suggesting {$curritem['name']}: {$curritem['grid']}\n";
	}
	
	$sum += $item['grid'];
	
	if ( $sum >= 16 ) {
		$sum = 0;
	}
	
	$grid[$i][] = $item; $loop++;
}



?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://www.clancats.com/css/stylesheet.css">
	</head>
	<body>
		<div id="content-container">
		<h1>Terrible random grid</h1><hr>
		<div class="row mark-grid">
			<?php foreach( $data as $item ) : ?>
			<div class="grid<?php echo $item['grid']; ?>"><img src="http://placehold.it/<?php echo (($item['grid'] * 40) + $item['grid'] * 20) - 20; ?>x150&text=<?php echo $item['name']; ?>" /></div>
			<?php endforeach; ?>
		</div>
		<h1>Awesome CCGrid calculator</h1><hr>
		<?php foreach( $grid as $data ) : ?>
		<div class="row mark-grid">
			<?php foreach( $data as $item ) : ?>
			<div class="grid<?php echo $item['grid']; ?>"><img src="http://placehold.it/<?php echo (($item['grid'] * 40) + $item['grid'] * 20) - 20; ?>x150&text=<?php echo $item['name']; ?>" /></div>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
		</div>
	</body>
</html>
