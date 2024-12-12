<?php
defined('TYPO3') or die();

$additionalFields = array(
	'cu_name_en' => 'cu_name_sv',
	'cu_sub_name_en' => 'cu_sub_name_sv'
);

foreach ($additionalFields as $sourceField => $destField) {
	$additionalColumns = array();
	$additionalColumns[$destField] = $GLOBALS['TCA']['static_currencies']['columns'][$sourceField];
	$additionalColumns[$destField]['label'] = 'LLL:EXT:static_info_tables_sv/Resources/Private/Language/locallang_db.xlf:static_currencies_item.' . $destField;

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('static_currencies', $additionalColumns);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('static_currencies', $destField, '', 'after:' . $sourceField);
	// Add as search field
	$GLOBALS['TCA']['static_currencies']['ctrl']['searchFields'] .= ',' . $destField;
}
unset($additionalColumns, $additionalFields);
