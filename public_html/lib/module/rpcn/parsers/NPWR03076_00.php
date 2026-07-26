<?php
$names = [
    0 => "Commando - Japanese Version | Normal",
    3 => "Commando - Japanese Version | Hard",
    6 => "Commando - Japanese Version | Ultimate",

    9 => "Commando - International Version | Normal",
    12 => "Commando - International Version | Hard",
    15 => "Commando - International Version | Ultimate",

    18 => "Legendary Wings - Japanese Version | Normal",
    21 => "Legendary Wings - Japanese Version | Hard",
    24 => "Legendary Wings - Japanese Version | Ultimate",

    27 => "Legendary Wings - International Version | Normal",
    30 => "Legendary Wings - International Version | Hard",
    33 => "Legendary Wings - International Version | Ultimate",

    36 => "Trojan - Japanese Version | Normal",
    39 => "Trojan - Japanese Version | Hard",
    42 => "Trojan - Japanese Version | Ultimate",

    45 => "Trojan - International Version | Normal",
    48 => "Trojan - International Version | Hard",
    51 => "Trojan - International Version | Ultimate",

    54 => "Ghosts'N Goblins - Japanese Version | Normal",
    57 => "Ghosts'N Goblins - Japanese Version | Hard",
    60 => "Ghosts'N Goblins - Japanese Version | Ultimate",

    63 => "Ghosts'N Goblins - International Version | Normal",
    66 => "Ghosts'N Goblins - International Version | Hard",
    69 => "Ghosts'N Goblins - International Version | Ultimate",

    72 => "Gun.Smoke - Japanese Version | Normal",
    75 => "Gun.Smoke - Japanese Version | Hard",
    78 => "Gun.Smoke - Japanese Version | Ultimate",

    81 => "Gun.Smoke - International Version | Normal",
    84 => "Gun.Smoke - International Version | Hard",
    87 => "Gun.Smoke - International Version | Ultimate",

    90 => "Pirate Ship Higemaru - Japanese Version | Normal",
    93 => "Pirate Ship Higemaru - Japanese Version | Hard",
    96 => "Pirate Ship Higemaru - Japanese Version | Ultimate",

    99 => "Pirate Ship Higemaru - International Version | Normal",
    102 => "Pirate Ship Higemaru - International Version | Hard",
    105 => "Pirate Ship Higemaru - International Version | Ultimate",

    108 => "Side Arms - Japanese Version | Normal",
    111 => "Side Arms - Japanese Version | Hard",
    114 => "Side Arms - Japanese Version | Ultimate",

    117 => "Side Arms - International Version | Normal",
    120 => "Side Arms - International Version | Hard",
    123 => "Side Arms - International Version | Ultimate",

    126 => "The Speed Rumbles - Japanese Version | Normal",
    129 => "The Speed Rumbles - Japanese Version | Hard",
    132 => "The Speed Rumbles - Japanese Version | Ultimate",

    135 => "The Speed Rumbles - International Version | Normal",
    138 => "The Speed Rumbles - International Version | Hard",
    141 => "The Speed Rumbles - International Version | Ultimate",

    144 => "Section Z - Japanese Version | Normal",
    147 => "Section Z - Japanese Version | Hard",
    150 => "Section Z - Japanese Version | Ultimate",

    153 => "Section Z - International Version | Normal",
    156 => "Section Z - International Version | Hard",
    159 => "Section Z - International Version | Ultimate",

    162 => "1943 - Japanese Version | Normal",
    165 => "1943 - Japanese Version | Hard",
    168 => "1943 - Japanese Version | Ultimate",

    171 => "1943 - International Version | Normal",
    174 => "1943 - International Version | Hard",
    177 => "1943 - International Version | Ultimate",

    180 => "SONSON - Japanese Version | Normal",
    183 => "SONSON - Japanese Version | Hard",
    186 => "SONSON - Japanese Version | Ultimate",

    189 => "SONSON - International Version | Normal",
    192 => "SONSON - International Version | Hard",
    195 => "SONSON - International Version | Ultimate",

    198 => "Avengers - Japanese Version | Normal",
    201 => "Avengers - Japanese Version | Hard",
    204 => "Avengers - Japanese Version | Ultimate",

    207 => "Avengers - International Version | Normal",
    210 => "Avengers - International Version | Hard",
    213 => "Avengers - International Version | Ultimate",

    216 => "Black Tiger - Japanese Version | Normal",
    219 => "Black Tiger - Japanese Version | Hard",
    222 => "Black Tiger - Japanese Version | Ultimate",

    225 => "Black Tiger - International Version | Normal",
    228 => "Black Tiger - International Version | Hard",
    231 => "Black Tiger - International Version | Ultimate",

    234 => "1942 - Japanese Version | Normal",
    237 => "1942 - Japanese Version | Hard",
    240 => "1942 - Japanese Version | Ultimate",

    243 => "1942 - International Version | Normal",
    246 => "1942 - International Version | Hard",
    249 => "1942 - International Version | Ultimate",

    252 => "Savage Bees - Japanese Version | Normal",
    255 => "Savage Bees - Japanese Version | Hard",
    258 => "Savage Bees - Japanese Version | Ultimate",

    261 => "Savage Bees - International Version | Normal",
    264 => "Savage Bees - International Version | Hard",
    267 => "Savage Bees - International Version | Ultimate",

    270 => "1943 KAI - Japanese Version | Normal",
    273 => "1943 KAI - Japanese Version | Hard",
    276 => "1943 KAI - Japanese Version | Ultimate",

    279 => "1943 KAI - International Version | Normal",
    282 => "1943 KAI - International Version | Hard",
    285 => "1943 KAI - International Version | Ultimate",

    288 => "Vulgus - Japanese Version | Normal",
    291 => "Vulgus - Japanese Version | Hard",
    294 => "Vulgus - Japanese Version | Ultimate",

    297 => "Vulgus - International Version | Normal",
    300 => "Vulgus - International Version | Hard",
    303 => "Vulgus - International Version | Ultimate",
];

return [
    "title" => "Capcom Arcade Cabinet",
    "config" => [
        "game_id" => ["NPEB00980"],
        "names" => $names,
        "time_boards" => [],
        "score_boards" => [],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>