<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Behat context class.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets it's own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given Bob is on the ticket creation page
     */
    public function bobIsOnTheTicketCreationPage()
    {
        $this->visit('new_ticket.php');
    }

    /**
     * @Given he fill :field with :value
     */
    public function heFillWith($field, $value)
    {
        $this->fillField($field, $value);
    }

    /**
     * @When he press :arg1
     */
    public function hePress($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then he should see :arg1
     */
    public function heShouldSee($arg1)
    {
        throw new PendingException();
    }
}
