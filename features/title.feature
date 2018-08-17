Feature: Title
  In order to see the title
  As a visitor
  I need to be able to see the title

  Rules:
  - Title is "WP Test Example"

  Scenario: Viewing the website as a regular user
    Given the title of the site is "WP Test Example"
    When I open the homepage
    Then I should see the title in the markup
    And the title should be "WP Test Example - foo"