<?php

return [
    'invalid_vat_format' => 'The given vat id has a wrong format',
    'security-warning' => 'Suspicious activity found!!!',
    'nothing-to-delete' => 'Nothing to delete',

    'layouts' => [
        'my-account' => 'My Account',
        'profile' => 'Profile',
        'address' => 'Address',
        'reviews' => 'Reviews',
        'wishlist' => 'Wishlist',
        'orders' => 'Orders',
        'downloadable-products' => 'Downloadable Products'
    ],

    'common' => [
        'error' => 'Something went wrong, please try again later.',
        'no-result-found' => 'We could not find any records.'
    ],

    'home' => [
        'page-title' => config('app.name') . ' - Home',
        'featured-products' => 'Featured Products',
        'new-products' => 'New Products',
        'verify-email' => 'Verify your email account',
        'resend-verify-email' => 'Resend Verification Email'
    ],

    'header' => [
        'title' => 'Account',
        'dropdown-text' => 'Manage Cart, Orders & Wishlist',
        'sign-in' => 'Sign In',
        'sign-up' => 'Зарегистрироваться',
        'account' => 'Account',
        'cart' => 'Cart',
        'profile' => 'Profile',
        'wishlist' => 'Wishlist',
        'cart' => 'Cart',
        'logout' => 'Выйти',
        'search-text' => 'Поиск'
    ],

    'minicart' => [
        'view-cart' => 'View Shopping Cart',
        'checkout' => 'Checkout',
        'cart' => 'Cart',
        'zero' => '0'
    ],

    'footer' => [
        'subscribe-newsletter' => 'Subscribe Newsletter',
        'subscribe' => 'Subscribe',
        'locale' => 'Locale',
        'currency' => 'Currency',
    ],

    'subscription' => [
        'unsubscribe' => 'Unsubcribe',
        'subscribe' => 'Subscribe',
        'subscribed' => 'You are now subscribed to subscription emails.',
        'not-subscribed' => 'You can not be subscribed to subscription emails, please try again later.',
        'already' => 'You are already subscribed to our subscription list.',
        'unsubscribed' => 'You are unsubscribed from subscription mails.',
        'already-unsub' => 'You are already unsubscribed.',
        'not-subscribed' => 'Error! Mail can not be sent currently, please try again later.'
    ],

    'search' => [
        'no-results' => 'No Results Found',
        'page-title' => config('app.name') . ' - Search',
        'found-results' => 'Search Results Found',
        'found-result' => 'Search Result Found'
    ],

    'reviews' => [
        'title' => 'Title',
        'add-review-page-title' => 'Add Review',
        'write-review' => 'Write a review',
        'review-title' => 'Give your review a title',
        'product-review-page-title' => 'Product Review',
        'rating-reviews' => 'Rating & Reviews',
        'submit' => 'SUBMIT',
        'delete-all' => 'All Reviews has deleted Succesfully',
        'ratingreviews' => ':rating Ratings & :review Reviews',
        'star' => 'Star',
        'percentage' => ':percentage %',
        'id-star' => 'star',
        'name' => 'Name',
    ],

    'customer' => [
        'signup-text' => [
            'account_exists' => 'Already have an account',
            'title' => 'Sign In'
        ],

        'signup-form' => [
            'page-title' => 'Create New Customer Account',
            'title' => 'Sign Up',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'email' => 'Адрес электронной почты',
            'password' => 'Пароль',
            'confirm_pass' => 'Подтверждение пароля',
            'button_title' => 'Зарегистрироваться',
            'agree' => 'Agree',
            'terms' => 'Terms',
            'conditions' => 'Conditions',
            'using' => 'by using this website',
            'agreement' => 'Agreement',
            'success' => 'Аккаунт был успешно создан',
            'success-verify' => 'Account created successfully, an e-mail has been sent for verification.',
            'success-verify-email-unsent' => 'Account created successfully, but verification e-mail unsent.',
            'failed' => 'Error! Can not create your account, pleae try again later.',
            'already-verified' => 'Your account is already verified Or please try sending a new verification email again.',
            'verification-not-sent' => 'Error! Problem in sending verification email, please try again later.',
            'verification-sent' => 'Verification email sent',
            'verified' => 'Your account has been verified, try to login now.',
            'verify-failed' => 'We cannot verify your mail account.',
            'dont-have-account' => 'You do not have account with us.',
            'success' => 'Account Created Successfully',
            'success-verify' => 'Account Created Successfully, an e-mail has been sent for verification.',
            'success-verify-email-unsent' => 'Account created successfully, but verification e-mail unsent',
            'failed' => 'Error! Cannot Create Your Account, Try Again Later',
            'already-verified' => 'Your Account is already verified Or Please Try Sending A New Verification Email Again',
            'verification-not-sent' => 'Error! Problem In Sending Verification Email, Try Again Later',
            'verification-sent' => 'Verification Email Sent',
            'verified' => 'Your Account Has Been Verified, Try To Login Now',
            'verify-failed' => 'We Cannot Verify Your Mail Account',
            'dont-have-account' => 'You Do Not Have Account With Us',
            'customer-registration' => 'Customer Registered Successfully',
            'address' => 'адрес',
            'home' => 'Квартира',
            'city' => 'Город',
            'index' => 'Индекс'
        ],

        'login-text' => [
            'no_account' => 'Нет аккаунта',
            'title' => 'зарегистрироваться',
        ],

        'login-form' => [
            'not_account_yet' => 'У вас еще нет аккаунта?',
            'page-title' => 'Customer Login',
            'title' => 'Войти',
            'email' => 'Адрес электронной почты:',
            'password' => 'Пароль',
            'forgot_pass' => 'Забыли пароль?',
            'button_title' => 'Войти',
            'remember' => 'Запомнить',
            'footer' => '© Copyright :year Webkul Software, All rights reserved',
            'invalid-creds' => 'Пожалуйста, проверьте свои данные и попробуйте снова.',
            'verify-first' => 'Verify your email account first.',
            'not-activated' => 'Your activation seeks admin approval',
            'resend-verification' => 'Resend verification mail again'
        ],

        'forgot-password' => [
            'title' => 'Восстановить пароль',
            'email' => 'Адрес электронной почты',
            'submit' => 'Отправить Сбросить пароль на электронную почту',
            'page_title' => 'Forgot your password ?'
        ],

        'reset-password' => [
            'title' => 'Reset Password',
            'email' => 'Registered Email',
            'password' => 'Password',
            'confirm-password' => 'Confirm Password',
            'back-link-title' => 'Back to Sign In',
            'submit-btn-title' => 'Reset Password'
        ],

        'account' => [
            'dashboard' => 'Edit Profile',
            'menu' => 'Menu',

            'profile' => [
                'index' => [
                    'page-title' => 'Profile',
                    'title' => 'Profile',
                    'edit' => 'Edit',
                ],

                'edit-success' => 'Profile updated successfully.',
                'edit-fail' => 'Error! Profile cannot be updated, please try again later.',
                'unmatch' => 'The old password does not match.',

                'fname' => 'Имя',
                'lname' => 'Фамилия',
                'gender' => 'Gender',
                'other' => 'Other',
                'male' => 'Male',
                'female' => 'Female',
                'dob' => 'Date Of Birth',
                'phone' => 'Телефон',
                'email' => 'Электронная почта',
                'opassword' => 'Старый пароль',
                'password' => 'Пароль',
                'cpassword' => 'Подтвердите Пароль',
                'submit' => 'Подтвердить изменения',

                'edit-profile' => [
                    'title' => 'Edit Profile',
                    'page-title' => 'Edit Profile Form'
                ]
            ],

            'address' => [
                'index' => [
                    'page-title' => 'Address',
                    'title' => 'Address',
                    'add' => 'Add Address',
                    'edit' => 'Edit',
                    'empty' => 'You do not have any saved addresses here, please try to create it by clicking the link below',
                    'create' => 'Create Address',
                    'delete' => 'Delete',
                    'make-default' => 'Make Default',
                    'default' => 'Default',
                    'contact' => 'Contact',
                    'confirm-delete' =>  'Do you really want to delete this address?',
                    'default-delete' => 'Default address cannot be changed.',
                    'enter-password' => 'Enter Your Password.',
                ],

                'create' => [
                    'page-title' => 'Add Address Form',
                    'company_name' => 'Company name',
                    'first_name' => 'First name',
                    'last_name' => 'Last name',
                    'vat_id' => 'Vat id',
                    'vat_help_note' => '[Note: Use Country Code with VAT Id. Eg. INV01234567891]',
                    'title' => 'Add Address',
                    'street-address' => 'Street Address',
                    'country' => 'Country',
                    'state' => 'State',
                    'select-state' => 'Select a region, state or province',
                    'city' => 'City',
                    'postcode' => 'Postal Code',
                    'phone' => 'Телефон',
                    'submit' => 'Save Address',
                    'success' => 'Address have been successfully added.',
                    'error' => 'Address cannot be added.'
                ],

                'edit' => [
                    'page-title' => 'Edit Address',
                    'company_name' => 'Company name',
                    'first_name' => 'First name',
                    'last_name' => 'Last name',
                    'vat_id' => 'Vat id',
                    'title' => 'Edit Address',
                    'street-address' => 'Street Address',
                    'submit' => 'Save Address',
                    'success' => 'Address updated successfully.',
                ],
                'delete' => [
                    'success' => 'Address successfully deleted',
                    'failure' => 'Address cannot be deleted',
                    'wrong-password' => 'Wrong Password !'
                ]
            ],

            'order' => [
                'index' => [
                    'page-title' => 'Заказы',
                    'title' => 'Заказы',
                    'order_id' => 'Идентификатор заказа',
                    'date' => 'Дата',
                    'status' => 'Положение дел',
                    'total' => 'Всего',
                    'order_number' => 'Порядковый номер'
                ],

                'view' => [
                    'page-tile' => 'Заказ #:order_id',
                    'info' => 'Информация',
                    'placed-on' => 'Размещены на',
                    'products-ordered' => 'Заказанные продукты',
                    'invoices' => 'Счета-фактуры',
                    'shipments' => 'Отгрузки',
                    'SKU' => 'SKU',
                    'product-name' => 'Имя',
                    'qty' => 'Кол-во',
                    'item-status' => 'Состояние товара',
                    'item-ordered' => 'Заказал (:qty_ordered)',
                    'item-invoice' => 'счет-фактурирован (:qty_invoiced)',
                    'item-shipped' => 'погружено (:qty_shipped)',
                    'item-canceled' => 'отменен (:qty_canceled)',
                    'item-refunded' => 'Возвращено (:qty_refunded)',
                    'price' => 'Цена',
                    'total' => 'Всего',
                    'subtotal' => 'Промежуточный итог',
                    'shipping-handling' => 'Доставка и обработка',
                    'tax' => 'Tax',
                    'discount' => 'Скидка',
                    'tax-percent' => 'Процент налога',
                    'tax-amount' => 'Сумма налога',
                    'discount-amount' => 'Сумма скидки',
                    'grand-total' => 'Общая сумма',
                    'total-paid' => 'Итого',
                    'total-refunded' => 'Всего возмещено',
                    'total-due' => 'Итого к оплате',
                    'shipping-address' => 'Адрес доставки',
                    'billing-address' => 'Адрес для выставления счета',
                    'shipping-method' => 'способ доставки',
                    'payment-method' => 'Способ оплаты',
                    'individual-invoice' => 'Выставленный счет #:invoice_id',
                    'individual-shipment' => 'Отгрузка #:shipment_id',
                    'print' => 'Распечатать',
                    'invoice-id' => 'Идентификатор счета',
                    'order-id' => 'Номер заказа',
                    'order-date' => 'Дата заказа',
                    'bill-to' => 'Bill to',
                    'ship-to' => 'Ship to',
                    'contact' => 'Contact',
                    'refunds' => 'Refunds',
                    'individual-refund' => 'Refund #:refund_id',
                    'adjustment-refund' => 'Adjustment Refund',
                    'adjustment-fee' => 'Adjustment Fee',
                ]
            ],

            'wishlist' => [
                'page-title' => 'Wishlist',
                'title' => 'Wishlist',
                'deleteall' => 'Delete All',
                'moveall' => 'Move All Products To Cart',
                'move-to-cart' => 'Move To Cart',
                'error' => 'Cannot add product to wishlist due to unknown problems, please checkback later',
                'add' => 'Item successfully added to wishlist',
                'remove' => 'Item successfully removed from wishlist',
                'moved' => 'Item successfully moved To cart',
                'option-missing' => 'Product options are missing, so item can not be moved to the wishlist.',
                'move-error' => 'Item cannot be moved to wishlist, Please try again later',
                'success' => 'Item successfully added to wishlist',
                'failure' => 'Item cannot be added to wishlist, Please try again later',
                'already' => 'Item already present in your wishlist',
                'removed' => 'Item successfully removed from wishlist',
                'remove-fail' => 'Item cannot Be removed from wishlist, Please try again later',
                'empty' => 'You do not have any items in your wishlist',
                'remove-all-success' => 'All the items from your wishlist have been removed',
            ],

            'downloadable_products' => [
                'title' => 'Downloadable Products',
                'order-id' => 'Order Id',
                'date' => 'Date',
                'name' => 'Title',
                'status' => 'Status',
                'pending' => 'Pending',
                'available' => 'Available',
                'expired' => 'Expired',
                'remaining-downloads' => 'Remaining Downloads',
                'unlimited' => 'Unlimited',
                'download-error' => 'Download link has been expired.'
            ],

            'review' => [
                'index' => [
                    'title' => 'Reviews',
                    'page-title' => 'Reviews'
                ],

                'view' => [
                    'page-tile' => 'Review #:id',
                ]
            ]
        ]
    ],

    'products' => [
        'layered-nav-title' => 'Shop By',
        'price-label' => 'As low as',
        'remove-filter-link-title' => 'Clear All',
        'sort-by' => 'Sort By',
        'from-a-z' => 'From A-Z',
        'from-z-a' => 'From Z-A',
        'newest-first' => 'Newest First',
        'oldest-first' => 'Oldest First',
        'cheapest-first' => 'Cheapest First',
        'expensive-first' => 'Expensive First',
        'show' => 'Show',
        'pager-info' => 'Showing :showing of :total Items',
        'description' => 'Description',
        'specification' => 'Specification',
        'total-reviews' => ':total Reviews',
        'total-rating' => ':total_rating Ratings & :total_reviews Reviews',
        'by' => 'By :name',
        'up-sell-title' => 'We found other products you might like!',
        'related-product-title' => 'Related Products',
        'cross-sell-title' => 'More choices',
        'reviews-title' => 'Ratings & Reviews',
        'write-review-btn' => 'Write Review',
        'choose-option' => 'Choose an option',
        'sale' => 'Sale',
        'new' => 'New',
        'empty' => 'No products available in this category',
        'add-to-cart' => 'Add To Cart',
        'buy-now' => 'Buy Now',
        'whoops' => 'Whoops!',
        'quantity' => 'Quantity',
        'in-stock' => 'In Stock',
        'out-of-stock' => 'Out Of Stock',
        'view-all' => 'View All',
        'select-above-options' => 'Please select above options first.',
        'less-quantity' => 'Quantity can not be less than one.',
        'samples' => 'Samples',
        'links' => 'Links',
        'sample' => 'Sample',
        'name' => 'Name',
        'qty' => 'Qty',
        'starting-at' => 'Starting at',
        'customize-options' => 'Customize Options',
        'choose-selection' => 'Choose a selection',
        'your-customization' => 'Your Customization',
        'total-amount' => 'Total Amount',
        'none' => 'None'
    ],

    // 'reviews' => [
    //     'empty' => 'You Have Not Reviewed Any Of Product Yet'
    // ]

    'buynow' => [
        'no-options' => 'Please select options before buying this product.'
    ],

    'checkout' => [
        'cart' => [
            'integrity' => [
                'missing_fields' => 'Some required fields missing for this product.',
                'missing_options' => 'Options are missing for this product.',
                'missing_links' => 'Downloadable links are missing for this product.',
                'qty_missing' => 'Atleast one product should have more than 1 quantity.',
                'qty_impossible' => 'Cannot add more than one of these products to cart.'
            ],
            'create-error' => 'Encountered some issue while making cart instance.',
            'title' => 'Shopping Cart',
            'empty' => 'Your shopping cart is empty',
            'update-cart' => 'Update Cart',
            'continue-shopping' => 'Continue Shopping',
            'proceed-to-checkout' => 'Proceed To Checkout',
            'remove' => 'Remove',
            'remove-link' => 'Remove',
            'move-to-wishlist' => 'Move to Wishlist',
            'move-to-wishlist-success' => 'Item moved to wishlist successfully.',
            'move-to-wishlist-error' => 'Cannot move item to wishlist, please try again later.',
            'add-config-warning' => 'Please select option before adding to cart.',
            'quantity' => [
                'quantity' => 'Quantity',
                'success' => 'Cart Item(s) successfully updated.',
                'illegal' => 'Quantity cannot be lesser than one.',
                'inventory_warning' => 'The requested quantity is not available, please try again later.',
                'error' => 'Cannot update the item(s) at the moment, please try again later.'
            ],

            'item' => [
                'error_remove' => 'No items to remove from the cart.',
                'success' => 'Item was successfully added to cart.',
                'success-remove' => 'Item was removed successfully from the cart.',
                'error-add' => 'Item cannot be added to cart, please try again later.',
            ],
            'quantity-error' => 'Requested quantity is not available.',
            'cart-subtotal' => 'Cart Subtotal',
            'cart-remove-action' => 'Do you really want to do this ?',
            'partial-cart-update' => 'Only some of the product(s) were updated',
            'link-missing' => ''
        ],

        'onepage' => [
            'house' => 'Квартира',
            'title' => 'Checkout',
            'information' => 'Information',
            'shipping' => 'Shipping',
            'payment' => 'Payment',
            'complete' => 'Complete',
            'billing-address' => 'Billing Address',
            'sign-in' => 'Sign In',
            'company-name' => 'Company Name',
            'first-name' => 'Имя',
            'last-name' => 'Фамилия',
            'email' => 'Адрес электронной почты',
            'address1' => 'Улица',
            'city' => 'Город',
            'state' => 'State',
            'select-state' => 'Select a region, state or province',
            'postcode' => 'Индекс',
            'phone' => 'Телефон',
            'country' => 'Country',
            'order-summary' => 'Общие',
            'shipping-address' => 'Адрес доставки',
            'use_for_shipping' => 'Ship to this address',
            'continue' => 'Continue',
            'shipping-method' => 'Доставка',
            'payment-methods' => 'Оплата',
            'payment-method' => 'Оплата',
            'summary' => 'Общие',
            'price' => 'Price',
            'quantity' => 'Количества',
            'contact' => 'Contact',
            'place-order' => 'Заказ',
            'new-address' => 'Add New Address',
            'save_as_address' => 'Save this address',
            'apply-coupon' => 'Apply Coupon',
            'amt-payable' => 'Amount Payable',
            'got' => 'Got',
            'free' => 'Free',
            'coupon-used' => 'Coupon Used',
            'applied' => 'Applied',
            'back' => 'Back',
            'cash-desc' => 'Cash On Delivery',
            'money-desc' => 'Money Transfer',
            'paypal-desc' => 'Paypal Standard',
            'free-desc' => 'This is a free shipping',
            'flat-desc' => 'This is a flat rate',
            'password' => 'Password',
            'login-exist-message' => 'You already have an account with us, Sign in or continue as guest.',
            'enter-coupon-code' => 'Enter Coupon Code',
            'payment-term' => 'Нажав на эту кнопку, вы подтверждаете свой подростковый возраст и соглашаетесь на обработку персональных данных в соответствии с Условиями продажи.'
        ],

        'total' => [
            'order-summary' => 'Order Summary',
            'sub-total' => 'Items',
            'grand-total' => 'Grand Total',
            'delivery-charges' => 'Delivery Charges',
            'tax' => 'Tax',
            'discount' => 'Discount',
            'price' => 'price',
            'disc-amount' => 'Amount discounted',
            'new-grand-total' => 'New Grand Total',
            'coupon' => 'Coupon',
            'coupon-applied' => 'Applied Coupon',
            'remove-coupon' => 'Remove Coupon',
            'cannot-apply-coupon' => 'Cannot Apply Coupon',
            'invalid-coupon' => 'Coupon code is invalid.',
            'success-coupon' => 'Coupon code applied successfully.',
            'coupon-apply-issue' => 'Coupon code can\'t be applied.'
        ],

        'success' => [
            'title' => 'Order successfully placed',
            'thanks' => 'Thank you for your order!',
            'order-id-info' => 'Your order id is #:order_id',
            'info' => 'We will email you, your order details and tracking information'
        ]
    ],

    'mail' => [
        'order' => [
            'subject' => 'Подтверждение нового заказа',
            'heading' => 'Подтверждение заказа!',
            'dear' => 'Дорогой :customer_name',
            'dear-admin' => 'Дорогой :admin_name',
            'greeting' => 'Спасибо за ваш заказ :order_id размещены на :created_at',
            'greeting-admin' => 'Номер заказа :order_id размещены на :created_at',
            'summary' => 'Резюме заказа',
            'shipping-address' => 'Адрес доставки',
            'billing-address' => 'Платежный адрес',
            'contact' => 'Контакт',
            'shipping' => 'Способ доставки',
            'payment' => 'Способ оплаты',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'subtotal' => 'Промежуточный итог',
            'shipping-handling' => 'Доставка и обработка',
            'tax' => 'Tax',
            'discount' => 'скидка',
            'grand-total' => 'Общая сумма',
            'final-summary' => 'Спасибо за проявленный интерес к нашему магазину. Мы вышлем вам номер для отслеживания после его отправки.',
            'help' => 'Если вам нужна помощь, пожалуйста, свяжитесь с нами по адресу :support_email',
            'thanks' => 'Спасибо!',
            'cancel' => [
                'subject' => 'Order Cancel Confirmation',
                'heading' => 'Order Cancelled',
                'dear' => 'Dear :customer_name',
                'greeting' => 'You Order with order id #:order_id placed on :created_at has been cancelled',
                'summary' => 'Summary of Order',
                'shipping-address' => 'Shipping Address',
                'billing-address' => 'Billing Address',
                'contact' => 'Contact',
                'shipping' => 'Shipping Method',
                'payment' => 'Payment Method',
                'subtotal' => 'Subtotal',
                'shipping-handling' => 'Shipping & Handling',
                'tax' => 'Tax',
                'discount' => 'Discount',
                'grand-total' => 'Grand Total',
                'final-summary' => 'Thanks for showing your interest in our store',
                'help' => 'If you need any kind of help please contact us at :support_email',
                'thanks' => 'Thanks!',
            ]
        ],

        'invoice' => [
            'heading' => 'Your invoice #:invoice_id for Order #:order_id',
            'subject' => 'Invoice for your order #:order_id',
            'summary' => 'Summary of Invoice',
        ],

        'shipment' => [
            'heading' => 'Shipment #:shipment_id  has been generated for Order #:order_id',
            'inventory-heading' => 'New shipment #:shipment_id had been generated for Order #:order_id',
            'subject' => 'Shipment for your order #:order_id',
            'inventory-subject' => 'New shipment had been generated for Order #:order_id',
            'summary' => 'Summary of Shipment',
            'carrier' => 'Carrier',
            'tracking-number' => 'Tracking Number',
            'greeting' => 'An order :order_id has been placed on :created_at',
        ],

        'refund' => [
            'heading' => 'Your Refund #:refund_id for Order #:order_id',
            'subject' => 'Refund for your order #:order_id',
            'summary' => 'Summary of Refund',
            'adjustment-refund' => 'Adjustment Refund',
            'adjustment-fee' => 'Adjustment Fee'
        ],

        'forget-password' => [
            'subject' => 'Customer Reset Password',
            'dear' => 'Dear :name',
            'info' => 'You are receiving this email because we received a password reset request for your account',
            'reset-password' => 'Reset Password',
            'final-summary' => 'If you did not request a password reset, no further action is required',
            'thanks' => 'Thanks!'
        ],

        'customer' => [
            'new' => [
                'dear' => 'Dear :customer_name',
                'username-email' => 'UserName/Email',
                'subject' => 'New Customer Registration',
                'password' => 'Password',
                'summary' => 'Your account has been created.
                Your account details are below: ',
                'thanks' => 'Thanks!',
            ],

            'registration' => [
                'subject' => 'New Customer Registration',
                'customer-registration' => 'Customer Registered Successfully',
                'dear' => 'Dear :customer_name',
                'greeting' => 'Welcome and thank you for registering with us!',
                'summary' => 'Your account has now been created successfully and you can login using your email address and password credentials. Upon logging in, you will be able to access other services including reviewing past orders, wishlists and editing your account information.',
                'thanks' => 'Thanks!',
            ],

            'verification' => [
                'heading' => config('app.name') . ' - Email Verification',
                'subject' => 'Verification Mail',
                'verify' => 'Verify Your Account',
                'summary' => 'This is the mail to verify that the email address you entered is yours.
                Kindly click the Verify Your Account button below to verify your account.'
            ],

            'subscription' => [
                'subject' => 'Subscription Email',
                'greeting' => ' Welcome to ' . config('app.name') . ' - Email Subscription',
                'unsubscribe' => 'Unsubscribe',
                'summary' => 'Thanks for putting me into your inbox. It’s been a while since you’ve read ' . config('app.name') . ' email, and we don’t want to overwhelm your inbox. If you still do not want to receive
                the latest email marketing news then for sure click the button below.'
            ]
        ]
    ],

    'webkul' => [
        'copy-right' => '© Copyright :year Webkul Software, All rights reserved',
    ],

    'response' => [
        'create-success' => ':name created successfully.',
        'update-success' => ':name updated successfully.',
        'delete-success' => ':name deleted successfully.',
        'submit-success' => ':name submitted successfully.'
    ],
];
