<?php

declare(strict_types=1);

function getParamsToSign(
    array $params,
    array $ignoreParamKeys = [],
    string $prefix = '',
    bool $sort = true
): array {
    $paramsToSign = [
        'general'  => [
            'project_id' => '42',
            'payment_id' => '$paymentId',
        ],
        'customer'  => [
            'id' => '$customerId',
            'ip_address' => '$ip',
        ],
        'payment'  => [
            'payment_amount' => '$paymentAmount',
            'payment_currency' => '$paymentCurrency',
        ],
        'card'  => [
            'pan' => '$cardPan',
            'year' => '$cardYear',
            'month' => '$cardMonth',
            'card_holder' => '$cardHolder',
            'cvv' => '$cardCvv',
        ],
    ];

    foreach ($params as $key => $value) {
        if (in_array($key, $ignoreParamKeys, true)) {
            continue;
        }

        $paramKey = ($prefix ? $prefix . ':' : '') . $key;
        if (is_array($value)) {
            $subArray = getParamsToSign($value, $ignoreParamKeys, $paramKey, false);
            $paramsToSign = array_merge($paramsToSign, $subArray);
        } else {
            if (is_bool($value)) {
                $value = $value ? '1' : '0';
            } else {
                $value = (string)$value;
            }

            $paramsToSign[$paramKey] = $paramKey . ':' . $value;
        }
    }

    if ($sort) {
        ksort($paramsToSign, SORT_NATURAL);
    }

    return $paramsToSign;
}

$a = [
    'qwe' => [
        'rty' => 'uio',
        'asd' => 'fgh',
    ],
    'zxc' => 'vbn',
];

var_dump(getParamsToSign($a), []); die();
