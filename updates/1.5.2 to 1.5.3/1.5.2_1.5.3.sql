INSERT INTO `ui_settings` (`ui_settings_id`, `type`, `value`) VALUES
(45, 'header_homepage_status', 'yes'),
(46, 'header_all_categories_status', 'yes'),
(47, 'header_featured_products_status', 'yes'),
(48, 'header_todays_deal_status', 'yes'),
(49, 'header_bundled_product_status', 'yes'),
(50, 'header_classifieds_status', 'yes'),
(51, 'header_latest_products_status', 'yes'),
(52, 'header_all_brands_status', 'yes'),
(53, 'header_all_vendors_status', 'yes'),
(54, 'header_blogs_status', 'yes'),
(55, 'header_store_locator_status', 'yes'),
(56, 'header_contact_status', 'yes'),
(57, 'header_more_status', 'yes');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES
(30, 'commission_set', NULL, 'yes'),
(31, 'commission_amount', NULL, '30'),
(32, 'ssl_store_id', NULL, ''),
(33, 'ssl_store_passwd', NULL, ''),
(34, 'ssl_type', NULL, 'sandbox'),
(35, 'ssl_set', NULL, 'ok');
INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES
(NULL, 'guest_checkout_set', 'ok');
UPDATE `general_settings` SET `value` = '1.5.3' WHERE `type` = 'version';
