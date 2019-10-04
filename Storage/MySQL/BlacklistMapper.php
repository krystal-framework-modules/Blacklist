<?php

namespace Blacklist\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class BlacklistMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return 'users_blacklist';
    }

    /**
     * Checks whether a user is blocked by owner
     * 
     * @param int $ownerId Owner id
     * @param int $victimId User id to be blocked
     * @return boolean
     */
    public function isBlocked($ownerId, $victimId)
    {
        $db = $this->db->select(AbstractMapper::PARAM_JUNCTION_MASTER_COLUMN)
                       ->from(self::getTableName())
                       ->whereEquals(AbstractMapper::PARAM_JUNCTION_MASTER_COLUMN, $ownerId)
                       ->andWhereEquals(AbstractMapper::PARAM_JUNCTION_SLAVE_COLUMN, $victimId);

        return (bool) $db->queryScalar();
    }

    /**
     * Find blocked ids of an owner
     * 
     * @param int $ownerId Owner id
     * @return boolean
     */
    public function findBlockedIds($ownerId)
    {
        return $this->getSlaveIdsFromJunction(self::getTableName(), $ownerId);
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
        return $this->insertIntoJunction(self::getTableName(), $ownerId, array($victimId));
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
        $db = $this->db->delete()
                       ->from(self::getTableName())
                       ->whereEquals(AbstractMapper::PARAM_JUNCTION_MASTER_COLUMN, $ownerId)
                       ->andWhereEquals(AbstractMapper::PARAM_JUNCTION_SLAVE_COLUMN, $victimId);

        return (bool) $db->execute(true);
    }
}
