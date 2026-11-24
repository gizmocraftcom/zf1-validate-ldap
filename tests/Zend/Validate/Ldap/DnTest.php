<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * @category   Zend
 * @package    Zend_Validate
 */
#[Group('Zend_Validate')]
#[Group('Zend_Validate_Ldap')]
class Zend_Validate_Ldap_DnTest extends TestCase
{
    /**
     * @return array<string, array{string}>
     */
    public static function validDnProvider(): array
    {
        return array(
            'simple'    => array('CN=Alice,DC=example,DC=com'),
            'multi-rdn' => array('cn=Alice+uid=alice,ou=People,dc=example,dc=com'),
            'escaped'   => array('CN=Smith\, John,DC=example,DC=com'),
            'quoted'    => array('CN="Alice",DC=example'),
        );
    }

    /**
     * @return array<string, array{string}>
     */
    public static function invalidDnProvider(): array
    {
        return array(
            'empty'        => array(''),
            'no equals'    => array('foo'),
            'empty rdn'    => array('CN=Alice,,DC=example'),
        );
    }

    #[DataProvider('validDnProvider')]
    public function testValidDn(string $dn): void
    {
        $validator = new Zend_Validate_Ldap_Dn();
        $this->assertTrue($validator->isValid($dn));
        $this->assertSame(array(), $validator->getMessages());
    }

    #[DataProvider('invalidDnProvider')]
    public function testInvalidDn(string $dn): void
    {
        $validator = new Zend_Validate_Ldap_Dn();
        $this->assertFalse($validator->isValid($dn));
        $this->assertSame(
            array(Zend_Validate_Ldap_Dn::MALFORMED => 'DN is malformed'),
            $validator->getMessages()
        );
    }
}
