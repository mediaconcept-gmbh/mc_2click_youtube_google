<?php
namespace MC\McCookie\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Rafael Gonzalez Albes <albes@mediaconcept-ulm.de>
 * @author Stefan Hausladen <hausladen@mediaconcept-ulm.de>
 */
class CookieTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \MC\McCookie\Domain\Model\Cookie
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \MC\McCookie\Domain\Model\Cookie();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getMessageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMessage()
        );
    }

    /**
     * @test
     */
    public function setMessageForStringSetsMessage()
    {
        $this->subject->setMessage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'message',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTextMehrInformationenReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTextMehrInformationen()
        );
    }

    /**
     * @test
     */
    public function setTextMehrInformationenForStringSetsTextMehrInformationen()
    {
        $this->subject->setTextMehrInformationen('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'textMehrInformationen',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getButtonMessageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getButtonMessage()
        );
    }

    /**
     * @test
     */
    public function setButtonMessageForStringSetsButtonMessage()
    {
        $this->subject->setButtonMessage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'buttonMessage',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPidDataPrivacyReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPidDataPrivacy()
        );
    }

    /**
     * @test
     */
    public function setPidDataPrivacyForIntSetsPidDataPrivacy()
    {
        $this->subject->setPidDataPrivacy(12);

        self::assertAttributeEquals(
            12,
            'pidDataPrivacy',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMessageYoutubeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMessageYoutube()
        );
    }

    /**
     * @test
     */
    public function setMessageYoutubeForStringSetsMessageYoutube()
    {
        $this->subject->setMessageYoutube('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'messageYoutube',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTextMehrInformationenYoutubeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTextMehrInformationenYoutube()
        );
    }

    /**
     * @test
     */
    public function setTextMehrInformationenYoutubeForStringSetsTextMehrInformationenYoutube()
    {
        $this->subject->setTextMehrInformationenYoutube('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'textMehrInformationenYoutube',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getButtonMessageYoutubeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getButtonMessageYoutube()
        );
    }

    /**
     * @test
     */
    public function setButtonMessageYoutubeForStringSetsButtonMessageYoutube()
    {
        $this->subject->setButtonMessageYoutube('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'buttonMessageYoutube',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPidDataPrivacyYoutubeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPidDataPrivacyYoutube()
        );
    }

    /**
     * @test
     */
    public function setPidDataPrivacyYoutubeForIntSetsPidDataPrivacyYoutube()
    {
        $this->subject->setPidDataPrivacyYoutube(12);

        self::assertAttributeEquals(
            12,
            'pidDataPrivacyYoutube',
            $this->subject
        );
    }
}
