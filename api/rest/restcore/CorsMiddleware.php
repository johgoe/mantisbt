<?php

/**
 * A middleware class that handles Cors
 */
class CorsMiddleware {
    public $g_allowed_origins = array(
        "https://mantisbt.mobilexag.de",
        "https://stdkont.mobilex.intra",
        "http://localhost"
    );	
	public function __invoke( \Slim\Http\Request $request, \Slim\Http\Response $response, callable $next ) {
            $response = $next( $request, $response );
	
        		$origin =  $request->getUri()->getScheme(). '://'. $request->getUri()->getHost();
            if (in_array($origin, $this->g_allowed_origins, true) === true) {
                     return $response
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Credentials', 'true')
                        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            } 
	     
     
		return $response;
	}
}
