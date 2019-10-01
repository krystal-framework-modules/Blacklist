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
}