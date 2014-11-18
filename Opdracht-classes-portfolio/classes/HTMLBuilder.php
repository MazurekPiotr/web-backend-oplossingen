<?php 
    class HTMLBuilder{
        protected $header;
        protected $body;
        protected $footer;

        public function __construct($header, $body, $footer)
        {
            $this->header = $header;
            $this->body = $body;
            $this->footer = $footer;
            $this->buildPage();
        }
        public function buildPage()
        {
            include $this->header;
            include $this->body;
            include $this->footer;
        }
        
    }

?>