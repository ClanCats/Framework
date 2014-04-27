<?php
/**
 * Just an file example
 */
class FileController extends CCController {
	
	/*
	 * Display the file
	 */
	public function FileIndex() {
		
		$artists = array(
			'A Day to Remeber',
			'System of a Down',
			'Nirvana',
			'Metallica',
		);
		
		$doc = new DOMDocument();
		$doc->formatOutput = true;
		
		$docArtsist = $doc->createElement( 'artists' );
		
		foreach( $artists as $artist ) {
			$docArtsist->appendChild( $doc->createElement( 'artist', $artist ) );
		}
		
		$doc->appendChild( $docArtsist );
		
		$response = CCResponse::factory( $doc->saveXML() );
		$response->header( 'Content-Type', 'text/xml' );
		
		return $response;
	}
	
	/*
	 * Download it
	 */
	public function action_download() {
		return $this->FileIndex()->as_download();
	}
	
}