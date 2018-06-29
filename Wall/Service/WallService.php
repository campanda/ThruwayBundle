<?php

    namespace App\Wall\Service;

    use Psr\Log\LoggerInterface;

    use Symfony\Component\Serializer\SerializerInterface;

    use Campanda\SDK\Wall\Delegate\WallServiceDelegateInterface;
    use Campanda\SDK\Wall\DTO\Cry;

    /**
     * Class Wall
     *
     * Echos a request
     * - For testing autoremoting
     *
     * @package App\Wall\Service
     */
    class WallService implements WallServiceDelegateInterface {
    
        /**
         * @var LoggerInterface
         */
        private $logger;
    
        /**
         * @var SerializerInterface
         */
        private $serializer;
        
        public function __construct(LoggerInterface $logger, SerializerInterface $serializer) {
            $this->logger = $logger;
            $this->serializer = $serializer;
        }
        
        /**
         * @param string $cry
         * @return string
         */
        public function shout(string $cry): string {
            $this->logger->debug('shout',['cry' => $cry]);
            $rtn = "$cry $cry";
            $this->logger->debug('shout',['cry' => $cry,'rtn' => $rtn]);
            return $rtn;
        }
    
        /**
         * @param Cry $cry
         * @return Cry
         */
        public function shoutDTO(Cry $cry): Cry {
            $this->logger->debug('shout', [
                'cry'=> $this->serializer->serialize($cry,'json')
            ]);
            $rtn = new Cry($cry->getUtterance().' '.$cry->getUtterance());
            $this->logger->debug('shout', [
                'cry'=> $this->serializer->serialize($cry,'json'),
                'rtn'=> $this->serializer->serialize($rtn,'json')
            ]);
            return $rtn;
        }
    
    
    }