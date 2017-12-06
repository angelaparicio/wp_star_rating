<?php
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	
	/*
	Plugin Name: Star Rating
	Description: Añade valoraciones con estrellas a las entradas mediante un shortcode
	Author: Angel Aparicio
	Version: 0.1
	*/
	
	function star_rating_shortcode( $attributes ){
		
		define('FULL_STAR', '&#9733;');
		define('EMPY_STAR', '&#9734;');
		
		$titles = array(
			1 => 'No me gustó. Nada aprovechable',
			2 => 'No me gustó, pero tiene alguna virtud',
			3 => 'Bien. Nivel medio. Ni más, ni menos',
			4 => 'Me gustó. Recomendable, aunque con reservas',
			5 => 'Me encantó. Recomendable sin dudar'
		);
		
		$output = '';
		$val = $attributes['val'];
		if ( isset($attributes['val']) ){

			$output = 'Valoración: ';
			for ( $i = 1; $i <= 5; $i++){
				
				if ( $i <= $attributes['val'] ){
					$output .= '<span class="rating_star" title="'.$titles[$val].'">'.FULL_STAR.'</span>';
				}
				else {
					$output .= '<span class="rating_star" title="'.$titles[$val].'">'.EMPY_STAR.'</span>';
				}
				
			}

			$output .= '<style type="text/css"> .rating_star {cursor:help;} </style>';

		}
		else {
			$output = 'Necesitas el atributo val';
		}


		return $output;
	}
	
	add_shortcode( 'star_rating', 'star_rating_shortcode' );		
	