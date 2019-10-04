<?php

namespace Blacklist\Controller;

use Site\Controller\AbstractSiteController;
use Krystal\Stdlib\VirtualEntity;

final class Blacklist extends AbstractSiteController
{
    /**
     * List all blocked users
     * 
     * @return string
     */
    public function listAction()
    {
        // Find blocked ids of current user
        $blockedIds = $this->getModuleService('blacklistService')->findBlockedIds($this->getAuthService()->getId());

        // Find blocked users
        $users = $this->getAuthService()->findByIds($blockedIds);

        return $this->view->render('profile/blocked', array(
            'blocked' => $users
        ));
    }

    /**
     * Blocks a user by their id
     * 
     * @param int $id User id to be blocked
     * @return mixed
     */
    public function blockAction($id)
    {
        if ($this->getModuleService('blacklistService')->block($this->getAuthService()->getId(), $id)) {
            $this->flashBag->set('success', 'Selected user has been blocked successfully');
        }

        return $this->response->back();
    }

    /**
     * Unblocks a user by their id
     * 
     * @param int $id User id to be unblocked
     * @return mixed
     */
    public function unblockAction($id)
    {
        if ($this->getModuleService('blacklistService')->unblock($this->getAuthService()->getId(), $id)) {
            $this->flashBag->set('success', 'Selected user has been unblocked successfully');
        }

        return $this->response->back();
    }
}
