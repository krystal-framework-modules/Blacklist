# Blacklist

A simple and lightweight module to handle user's blacklist.

# Usage

First of all, you need to create a table. Execute `\Blacklist\Storage\MySQL schema.sql` to create it.

## Blocking and unblocking users

There are two corresponding controller actions to do that. Whenever you need to create links, just generate corresponding URLs.

To block a user by their id:

`<a href="<?= $this->url('Blacklist:Blacklist@unblockAction', array($id)); ?>">Unblock</a>`

To unblock a user by their id:

`<a href="<?= $this->url('Blacklist:Blacklist@blockAction', array($id)); ?>">Unblock</a>`

Where `$id` is an id of a user to be either blocked or unblocked. After clicking on aforementioned links, a page gets refreshed flashing a corresponding message.

In case you need to perform this in your business logic, you can use these available methods:

`\Blacklist\Service\BlacklistService::block($ownerId, $victimId);`

or 

`\Blacklist\Service\BlacklistService::unblock($ownerId, $victimId);`

Where `$ownerId` is an id of profile owner and `$victimId` is ad id of another user.


## Checking whether user is blocked

Whenever you require checking another user being blocked, use this method

`\Blacklist\Service\BlacklistService::unblock($ownerId, $victimId);`

Tip: Wrap the checking in a shared controller, so that you don't have to duplicate code in every another controller.