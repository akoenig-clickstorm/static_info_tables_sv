<?php
defined('TYPO3') or die();

$sourceField = 'cn_short_en';
$destField = 'cn_short_sv';

$additionalColumns = array();
$additionalColumns[$destField] = $GLOBALS['TCA']['static_countries']['columns'][$sourceField];
$additionalColumns[$destField]['label'] = 'LLL:EXT:static_info_tables_sv/Resources/Private/Language/locallang_db.xlf:static_countries_item.' . $destField;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('static_countries', $additionalColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('static_countries', $destField, '', 'after:' . $sourceField);
// Add as search field
$GLOBALS['TCA']['static_countries']['ctrl']['searchFields'] .= ',' . $destField;

unset($additionalColumns, $additionalFields);