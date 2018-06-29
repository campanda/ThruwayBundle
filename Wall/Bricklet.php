<?php
    
    
    namespace App\Wall;
    
    use Campanda\Core\Brick\Let\BaseBricklet;

    use App\Wall\Service\WallService;
    
    class Bricklet extends BaseBricklet {
    
        /**
         * Bricklet constructor.
         *
         * @param WallService $delegate
         */
        public function __construct(WallService $delegate) {
            $this->delegate = $delegate;
        }
        
    }
	
