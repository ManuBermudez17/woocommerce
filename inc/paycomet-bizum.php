<?php

class Paycomet_Bizum extends Paycomet_APM
{
    // Setup our Gateway's id, description and other values
    public function __construct()
    {
        $this->id = 'paycomet_bizum';
        $this->icon = PAYTPV_PLUGIN_URL . 'images/bizum.png';
        $this->has_fields = false;
        $this->method_title = 'PAYCOMET - BIZUM';
        $this->method_description = __('Pay with Bizum. Configuration is on PAYCOMET main payment method.', 'wc_paytpv' );
        $this->methodId = 11;
        $this->title = __('Pay with Bizum', 'wc_paytpv' );

        $this->supports = array(
            'refunds'
        );

        $this->init_form_fields();
        $this->init_settings();
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
