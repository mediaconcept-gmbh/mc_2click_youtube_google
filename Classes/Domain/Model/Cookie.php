<?php
namespace MC\McCookie\Domain\Model;


/***
 *
 * This file is part of the "Cookie" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 Rafael Gonzalez Albes <albes@mediaconcept-ulm.de>, mediaconcept GmbH
 *           Stefan Hausladen <hausladen@mediaconcept-ulm.de>, mediaconcept GmbH
 *
 ***/
/**
 * Cookie
 */
class Cookie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * message
     * 
     * @var string
     */
    protected $message = '';

    /**
     * textMehrInformationen
     * 
     * @var string
     */
    protected $textMehrInformationen = '';

    /**
     * buttonMessage
     * 
     * @var string
     */
    protected $buttonMessage = '';

    /**
     * pidDataPrivacy
     * 
     * @var int
     */
    protected $pidDataPrivacy = 0;

    /**
     * messageYoutube
     * 
     * @var string
     */
    protected $messageYoutube = '';

    /**
     * textMehrInformationenYoutube
     * 
     * @var string
     */
    protected $textMehrInformationenYoutube = '';

    /**
     * buttonMessageYoutube
     * 
     * @var string
     */
    protected $buttonMessageYoutube = '';

    /**
     * pidDataPrivacyYoutube
     * 
     * @var int
     */
    protected $pidDataPrivacyYoutube = 0;

    /**
     * Returns the message
     * 
     * @return string message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the message
     * 
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Returns the textMehrInformationen
     * 
     * @return string textMehrInformationen
     */
    public function getTextMehrInformationen()
    {
        return $this->textMehrInformationen;
    }

    /**
     * Sets the textMehrInformationen
     * 
     * @param string $textMehrInformationen
     * @return void
     */
    public function setTextMehrInformationen($textMehrInformationen)
    {
        $this->textMehrInformationen = $textMehrInformationen;
    }

    /**
     * Returns the buttonMessage
     * 
     * @return string buttonMessage
     */
    public function getButtonMessage()
    {
        return $this->buttonMessage;
    }

    /**
     * Sets the buttonMessage
     * 
     * @param string $buttonMessage
     * @return void
     */
    public function setButtonMessage($buttonMessage)
    {
        $this->buttonMessage = $buttonMessage;
    }

    /**
     * Returns the pidDataPrivacy
     * 
     * @return int pidDataPrivacy
     */
    public function getPidDataPrivacy()
    {
        return $this->pidDataPrivacy;
    }

    /**
     * Sets the pidDataPrivacy
     * 
     * @param int $pidDataPrivacy
     * @return void
     */
    public function setPidDataPrivacy($pidDataPrivacy)
    {
        $this->pidDataPrivacy = $pidDataPrivacy;
    }

    /**
     * Returns the messageYoutube
     * 
     * @return string messageYoutube
     */
    public function getMessageYoutube()
    {
        return $this->messageYoutube;
    }

    /**
     * Sets the messageYoutube
     * 
     * @param string $messageYoutube
     * @return void
     */
    public function setMessageYoutube($messageYoutube)
    {
        $this->messageYoutube = $messageYoutube;
    }

    /**
     * Returns the textMehrInformationenYoutube
     * 
     * @return string textMehrInformationenYoutube
     */
    public function getTextMehrInformationenYoutube()
    {
        return $this->textMehrInformationenYoutube;
    }

    /**
     * Sets the textMehrInformationenYoutube
     * 
     * @param string $textMehrInformationenYoutube
     * @return void
     */
    public function setTextMehrInformationenYoutube($textMehrInformationenYoutube)
    {
        $this->textMehrInformationenYoutube = $textMehrInformationenYoutube;
    }

    /**
     * Returns the buttonMessageYoutube
     * 
     * @return string buttonMessageYoutube
     */
    public function getButtonMessageYoutube()
    {
        return $this->buttonMessageYoutube;
    }

    /**
     * Sets the buttonMessageYoutube
     * 
     * @param string $buttonMessageYoutube
     * @return void
     */
    public function setButtonMessageYoutube($buttonMessageYoutube)
    {
        $this->buttonMessageYoutube = $buttonMessageYoutube;
    }

    /**
     * Returns the pidDataPrivacyYoutube
     * 
     * @return int pidDataPrivacyYoutube
     */
    public function getPidDataPrivacyYoutube()
    {
        return $this->pidDataPrivacyYoutube;
    }

    /**
     * Sets the pidDataPrivacyYoutube
     * 
     * @param int $pidDataPrivacyYoutube
     * @return void
     */
    public function setPidDataPrivacyYoutube($pidDataPrivacyYoutube)
    {
        $this->pidDataPrivacyYoutube = $pidDataPrivacyYoutube;
    }
}
