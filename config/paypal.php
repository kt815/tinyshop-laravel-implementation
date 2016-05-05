<?php
return array(
    // set your paypal credential
    'client_id' => 'AT38Dj0iZvEocPM64VJGEngMnL2-5PzvjD7_K_rpB34iIleiTL1Of52gnbt12Qcswa9DMkZB1TCVSrSi',
    'secret' => 'ELagw_WUb8zDmv3b75rTWtyDInbOIhDeLrGNWxR3D6UjvzRHYR3QNRAS9pNmm_K1sY4SMW-Xwt3XyabF',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);