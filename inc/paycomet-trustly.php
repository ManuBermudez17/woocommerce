<?php

class Paycomet_Trustly extends Paycomet_APM
{
    // Setup our Gateway's id, description and other values
    public function __construct()
    {
        $this->id = 'paycomet_trustly';
        $this->icon = PAYTPV_PLUGIN_URL . 'images/trustly.png';
        $this->has_fields = false;
        $this->method_title = 'PAYCOMET - Trustly';
        $this->method_description = __('Pay with Trustly. Configuration is on PAYCOMET main payment method.', 'wc_paytpv' );
        $this->methodId = 17;
        $this->title = __('Pay with Trustly', 'wc_paytpv' );
    }

    public function process_payment($order_id)
    {
        return parent::payWithAlternativeMethod($order_id, $this->methodId);
    }

    public function can_refund_order($order)
    {
        return parent::canRefundOrder($this->methodId);
    }
}
