# Changelog

## 2.0.0

- Package renamed to `gizmocraft/zendframework1-validate-ldap` (fork of `diablomedia/zendframework1-validate-ldap`).
- Requires PHP >= 8.5; CI runs on PHP 8.5 and 8.6.
- Depends on `gizmocraft/zendframework1-ldap` ^2.0.0 and `gizmocraft/zendframework1-validate` ^2.0.0.
- Dev dependencies upgraded to PHPUnit 13, PHPStan 2.3, php-cs-fixer 3.95 and GrumPHP 2.27; `composer-require-checker` dropped.
- Added a small PHPUnit test suite for `Zend_Validate_Ldap_Dn` (upstream had no tests).
- No public signature changes and no PHP 8.5/8.6 code fixes were needed.
