<?php
class Request
{
    private $get;
    private $post;
    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }
    public function post($key)
    {
        
        return isset($this->post[$key]) ? $this->post[$key] : null;
    }
    public function get($key)
    {
        return isset($this->get[$key]) ? $this->get[$key] : null;
    }
    public function isPost()
    {
        return (bool)$this->post;
    }

}