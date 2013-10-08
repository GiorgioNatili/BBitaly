<?php


class FacebookUserIdentity extends CUserIdentity {
    
    private $_id = null;
    
    public function authenticate() {
        $user = Users::model()->findByAttributes(array(
            'extra' => $this->username,
            'source' => $this->password
        ));
        
        if ( null == $user ) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode=self::ERROR_NONE;
            $this->_id = $user->id;
            Yii::app()->user->setState('info', $user);
        }
        
        return !$this->errorCode;
    }
    
    public function getId() {
        return $this->_id;
    }
}
?>
