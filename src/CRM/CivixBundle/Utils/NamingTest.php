<?php

namespace CRM\CivixBundle\Utils;

class NamingTest extends \PHPUnit_Framework_TestCase {

  public function getFullNameExamples() {
    return [
      // [$name, $expectValid, $expectShort, $expectCamel]
      ['org.example.foo', TRUE, 'foo', 'Foo'],
      ['.org.example.foo', FALSE, NULL, NULL],
      ['civicrm-foo-bar', TRUE, 'foo_bar', 'FooBar'],
      ['foo-bar', TRUE, 'foo_bar', 'FooBar'],
      ['-foo', FALSE, NULL, NULL],
      ['civicrm-foo-bar.', FALSE, NULL, NULL],
      ['org..foobar', FALSE, NULL, NULL],
    ];
  }

  /**
   * @dataProvider getFullNameExamples
   */
  public function testIsValidFullName($name, $expectValid, $expectShort, $expectCamel) {
    $this->assertEquals($expectValid, Naming::isValidFullName($name));
  }

  /**
   * @dataProvider getFullNameExamples
   */
  public function testCreateShortName($name, $expectValid, $expectShort, $expectCamel) {
    if (!$expectValid) {
      return;
    }
    $this->assertEquals($expectShort, Naming::createShortName($name));
  }

  /**
   * @dataProvider getFullNameExamples
   */
  public function testCreateCamelName($name, $expectValid, $expectShort, $expectCamel) {
    if (!$expectValid) {
      return;
    }
    $this->assertEquals($expectCamel, Naming::createCamelName($name));
  }

}
