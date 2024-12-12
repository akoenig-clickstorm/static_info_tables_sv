<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function()
{
    $extensionKey = 'static_info_tables_sv';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
        $extensionKey,
        'setup',
        '@import \'EXT:' . $extensionKey . '/Configuration/TypoScript/Extbase/setup.txt\''
    );
});
