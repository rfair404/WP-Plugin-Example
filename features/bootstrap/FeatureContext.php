<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\GoutteDriver;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $session;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        require_once dirname( dirname( __DIR__ ) ) . '/wp/wp-load.php';
    }

    /**
     * @Given the title of the site is :arg1
     */
    public function theTitleOfTheSiteIs($arg1)
    {
        \update_option( 'blogname', $arg1 );
    }

    /**
     * @When I open the homepage
     */
    public function iOpenTheHomepage()
    {
        $driver = new \Behat\Mink\Driver\GoutteDriver();
        $this->session = new \Behat\Mink\Session($driver);
        $this->session->visit('http://localhost');
    }

    /**
     * @Then I should see the title in the markup
     */
    public function iShouldSeeTheTitleInTheMarkup()
    {
        $page = $this->session->getPage();
        $title = $page->find( 'css', '.site-title' );
        if ( null === $title ) {
            throw new \Exception( 'Site Title Not Found' );
        }
    }

    /**
     * @Then the title should be :arg1
     */
    public function theTitleShouldBe($arg1)
    {
        $page = $this->session->getPage();
        $title = $page->find( 'css', '.site-title' )->getText();
        if ( $arg1 !== $title ) {
            throw new \Exception( sprintf( 'Site title (%s) does not match expected %s', $title, $arg1 ) );
        }
    }

    /**
     * @When I open the \/wp-admin
     */
    public function iOpenTheWpAdmin()
    {

        $this->session = new \Behat\Mink\Session($driver);
        $this->session->visit('http://localhost/wp-admin');
    }
}
