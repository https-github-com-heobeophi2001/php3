<?php

const BASE_URL = "http://localhost:8000";
const PUBLIC_PATH = BASE_URL . "public/";

    return [
        'user' => [
            'gender' =>[
                "male" => 1,
                "female" => 0,
            ],
        ],
        'role' => [
            'user' => 1,
            'admin' => 2,
        ],
        'invoice' => [
            'status' => [
                'cho_duyet' => 1,
                'dang_xu_li'=> 2,
                'dang_giao' => 3,
                'da_giao' => 4,
                'da_huy' => 5,
                'chuyen_hoan' => 6,
            ]
            ],
        
    ];
?>
