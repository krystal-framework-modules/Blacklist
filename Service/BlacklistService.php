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
    private $blacklistMapper;

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

    /**
     * Find blocked ids of an owner
     * 
     * @param int $ownerId Owner id
     * @return boolean
     */
    public function findBlockedIds($ownerId)
    {
        return $this->blacklistMapper->findBlockedIds($ownerId);
    }

    /**
     * Blocks a user
     * 
     * @param int $ownerId Owner id
     * @param int $victimId User id to be blocked
     * @return boolean
     */
    public function block($ownerId, $victimId)
    {
        if ($ownerId == $victimId) {
            return false;
        }

        return $this->blacklistMapper->block($ownerId, $victimId);
    }

    /**
     * Unblocks a user
     * 
     * @param int $ownerId Owner id
     * @param int $victimId User id to be unblocked
     * @return boolean
     */
    public function unblock($ownerId, $victimId)
    {
        if ($ownerId == $victimId) {
            return false;
        }

        return $this->blacklistMapper->unblock($ownerId, $victimId);
    }
}
