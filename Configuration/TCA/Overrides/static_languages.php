<?php
defined('TYPO3') or die();

$sourceField = 'lg_name_en';
$destField = 'lg_name_sv';

$additionalColumns = array();
$additionalColumns[$destField] = $GLOBALS['TCA']['static_languages']['columns'][$sourceField];
$additionalColumns[$destField]['label'] = 'LLL:EXT:static_info_tables_sv/Resources/Private/Language/locallang_db.xlf:static_languages_item.' . $destField;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('static_languages', $additionalColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('static_languages', $destField, '', 'after:' . $sourceField);
// Add as search field
$GLOBALS['TCA']['static_languages']['ctrl']['searchFields'] .= ',' . $destField;

unset($additionalColumns, $additionalFields);
