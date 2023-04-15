<?php
Class AutomateBot
{

        protected $_token = "6104894060:AAHdy7nzmH81tMSZ-22RegNajVeiucCxdEs";
        protected $chatId;
        protected $messages;
        protected $url = "https://api.telegram.org/bot";
        function __construct($message,$chatId,){
            $this->messages = $message;
            $this->chatId = $chatId;
        }

        protected function findEntries($message, $wordToFind){

            foreach($wordToFind as $word){
                if(strpos($message,$word) !== false)return $word;
            }

        }


        public function replyMessage(){
            $reply= $this->setMessage($this->messages);

            $send =$this->url .$this->_token."/sendmessage?parse_mode=html&chat_id=" 
            . $this->chatId . "&text=" . urlencode($reply);
            file_get_contents($send);
        }



        protected function setMessage($message){
            $message = strtolower($message);
            if ($message == "/start"||$message == "hola")return "Hola! ¿Como te puedo ayudar?";

            $isPasillo_uno=$this->findEntries($message,['queso','jamon','jamón','carne']);
            if($isPasillo_uno) return "Encontraras " . $isPasillo_uno . " en el pasillo 1";

            $isPasillo_dos=$this->findEntries($message,['cereal','yoghurth','leche']); 
            if($isPasillo_dos)return "Encontraras " . $isPasillo_dos . " en el pasillo 2";

            $isPasillo_tres=$this->findEntries($message,['bedidas','jugos']);  
            if($isPasillo_tres)return "Encontraras " . $isPasillo_tres . " en el pasillo 3";

            $isPasillo_quatro=$this->findEntries($message,['pan','pasteles','tortas']);  
            if($isPasillo_quatro)return "Encontraras " . $isPasillo_quatro . " en el pasillo 4";
            
            $isPasillo_quatro=$this->findEntries($message,['detergente','lavaloza']);  
            if($isPasillo_quatro)return "Encontraras " . $isPasillo_quatro. " en el pasillo 5";
            
            //return the default message
            return "No entiendo la pregunta";
        }
}