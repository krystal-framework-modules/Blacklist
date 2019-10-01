<?php

namespace Blacklist\Service;

use Krystal\Application\Model\AbstractService;
use Blacklist\Storage\MySQL\BlacklistMapper;

final class BlacklistService extends AbstractService
{
    /**
     * Any compliant mapper
     * 
     * @var \Blacklist\Storage\MySQL\BlacklistMapper
     */
    private $blacklistMapper

    /**
     * State initialization
     * 
     * @param \Blacklist\Storage\MySQL\BlacklistMapper $blacklistMapper     
     * @return void
     */
    public function __construct(BlacklistMapper $blacklistMapper)
    {
        $this->blacklistMapper = $blacklistMapper;
    }
}
