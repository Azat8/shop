<?php

namespace Webkul\Admin\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\Admin\Mail\NewOrderNotification;
use Webkul\Admin\Mail\NewAdminNotification;
use Webkul\Admin\Mail\NewInvoiceNotification;
use Webkul\Admin\Mail\NewShipmentNotification;
use Webkul\Admin\Mail\NewInventorySourceNotification;
use Webkul\Admin\Mail\CancelOrderNotification;
use Webkul\Admin\Mail\NewRefundNotification;

/**
 * Order event handler
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class Order
{

    /**
     * @param mixed $order
     *
     * Send new order Mail to the customer and admin
     */
    public function sendNewOrderMail($order)
    {
        try {
            $configKey = 'emails.general.notifications.emails.general.notifications.new-order';
            if (core()->getConfigData($configKey)) {
                Mail::queue(new NewOrderNotification($order));
            }

            $configKey = 'emails.general.notifications.emails.general.notifications.new-admin';

            if (core()->getConfigData($configKey)) {
                Mail::queue(new NewAdminNotification($order));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * @param mixed $invoice
     *
     * Send new invoice mail to the customer
     */
    public function sendNewInvoiceMail($invoice)
    {
        try {
            if ($invoice->email_sent) {
                return;
            }

            $configKey = 'emails.general.notifications.emails.general.notifications.new-invoice';
            if (core()->getConfigData($configKey)) {
                Mail::queue(new NewInvoiceNotification($invoice));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * @param mixed $refund
     *
     * Send new refund mail to the customer
     */
    public function sendNewRefundMail($refund)
    {
        try {
            $configKey = 'emails.general.notifications.emails.general.notifications.new-refund';
            if (core()->getConfigData($configKey)) {
                Mail::queue(new NewRefundNotification($refund));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * @param mixed $shipment
     *
     * Send new shipment mail to the customer
     */
    public function sendNewShipmentMail($shipment)
    {
        try {
            if ($shipment->email_sent) {
                return;
            }

            $configKey = 'emails.general.notifications.emails.general.notifications.new-shipment';
            if (core()->getConfigData($configKey)) {
                Mail::queue(new NewShipmentNotification($shipment));
            }

            $configKey = 'emails.general.notifications.emails.general.notifications.new-inventory-source';
            if (core()->getConfigData($configKey)) {
                Mail::queue(new NewInventorySourceNotification($shipment));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * @param mixed $order
     *
     */
    public function sendCancelOrderMail($order)
    {
        try {
            $configKey = 'emails.general.notifications.emails.general.notifications.cancel-order';
            if (core()->getConfigData($configKey)) {
                Mail::queue(new CancelOrderNotification($order));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }
}