Feature: Tickets
    In order to keep track of what need to be done in a project
    As a developper
    I need to be able to see, create and update tickets

    Rules:
    - tickets can have 3 statuses: new, in-progress, closed
    - tickets are composed of: id, name, author, assignee, description

    Scenario: Creating a ticket
        Given Bob is on the ticket creation page
        And he fill "name" with "Ticket name"
        And he fill "description" with "ticket description"
        When he press "Create ticket"
        Then he should see "Ticket created"
        And he should see "Ticket name"
