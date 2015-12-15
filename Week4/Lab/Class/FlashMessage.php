<?php namespace Lab4;

class FlashMessage extends Message {
    
    public function __construct() {      
        if ( !isset($_SESSION['flashmessages']) ) {
            parent::__construct();
            $this->setFlashMessages();
        }
               
        $this->messages = $_SESSION['flashmessages'];
    }
    
    public function addMessage($key, $msg) {
        parent::addMessage($key, $msg);
        $this->setFlashMessages();
    }
    
    public function removeMessage($key) {
        parent::removeMessage($key);
        $this->setFlashMessages();
    }
    
    public function getAllMessages(){
        $messages = $_SESSION['flashmessages'];
        $this->removeAllMessages();        
        return $messages;                
    }
    
     public function removeAllMessages(){
        parent::removeAllMessages();
        $this->setFlashMessages();
    }
    
    private function setFlashMessages() {
        
            $_SESSION['flashmessages'] = $this->messages;
        
    }
    
}
