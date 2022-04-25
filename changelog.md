# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2019-09-26
Added conditional_checkout_fields_products() and rab_remove_checkout_fields()
- removes unnecessary fields when users are getting free products.

## [1.0.1] - 2019-10-1
Added https://woocommerce.com/products/woocommerce-nested-category-layout/ plugin to organize the product page by category. This was stupid and something I'm sure I could have and should have done myself.

## [1.0.2] - 2019-10-1
Added (Checkout Field Editor plugin)[https://wordpress.org/plugins/woo-checkout-field-editor-pro/] to remoove the required fields at checkout. This way we can deal with error that was preventing my conditional logic from removing fields. I'm going to take another crack at it, however.

## [1.0.3] - 2019-10-2
Fixed issue with checkout where even though we were unsetting the checkout fields we didn't want to ask for when purchasing free products, the required fields were still preventing the user from moving to the next step of the process. Not happy with the way I came to the solution, but the good news is that it does what it was supposed to.
ref: https://jeroensormani.com/ultimate-guide-to-woocommerce-checkout-fields/ , https://stackoverflow.com/questions/50107409/make-checkout-addresses-fields-not-required-in-woocommerce

## [1.0.4] - 2019-11-27
Updated the code for the donate button.

## [1.0.5] - 2020-07-01
Fixed transparent search button

## [1.0.6] - 2020-11-19
Updated donate button

## [1.0.7] - 2020-11-20
added header donate CTA via js

## [1.0.8] - 2022-04-24
added header donate CTA via js

## [1.0.9] - 2022-04-25
updated the donation button link to https://network-weaver.raisely.com/