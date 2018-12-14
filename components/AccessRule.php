<?php
namespace app\components;
 
use app\models\User;
use app\models\Role;
class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {

        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role == '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role == '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            }  elseif (!$user->getIsGuest() && !($role == User::getMyRole())) {
                return true;
            }
            /*elseif (!$user->getIsGuest() && $role == $user->identity->role) {
                return true;
            }*/
        }
 
        return false;
    }
}
