<?php
/**
 * Widget Library
 *
 * @copyright   Copyright (c) 2008-2013 Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 */

namespace Widget;

/**
 * Response
 *
 * @author      Twin Huang <twinh@yahoo.cn>
 * @property    \Widget\Header $header The reponse header
 */
class Response extends AbstractWidget
{
    /**
     * Whether response content has been sent
     *
     * @var bool
     */
    protected $isSent = false;

    /**
     * The response content
     *
     * @var string
     */
    protected $content;

    /**
     * Send response header and content
     *
     * @param  string         $content
     * @param  int            $status
     * @param  array          $options
     * @return Response
     */
    public function __invoke($content = '', $status = 200, array $options = array())
    {
        $this->isSent = true;

        $this->content = $content;

        $this->header->setStatusCode($status);

        $this->header->send();

        $this->sendContent();

        return $this;
    }

    /**
     * Set response content
     *
     * @param  mixed          $content
     * @return Response
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get response content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Send response content
     */
    public function sendContent()
    {
        echo $this->content;
    }

    /**
     * @see \Widget\Response::__invoke
     */
    public function send($content = '', $status = 200)
    {
        return $this->__invoke($content, $status);
    }

    /**
     * Check if response has been sent
     *
     * @return bool
     */
    public function isSent()
    {
        return $this->isSent;
    }

    /**
     * Set response sent status
     *
     * @param  bool           $bool
     * @return Response
     */
    public function setSentStatus($bool)
    {
        $this->isSent = (bool) $bool;

        return $this;
    }
}
