<?php

return [
    'merchant' => "/^[0-9A-Z]{2}[0-9A-Z]{6}$/",
    'privateKey' => "/^[0-9A-Za-z]{8}$/",
    'Pays' => "/^[A-Za-z]{2}$/", // Country
    'NumPointRelais' => "/^[0-9]{6}$/",
    'Ville' => "/^[A-Za-z_\-']{2,25}$/", // City
    'CP' => "", // Zipcode
    'Latitude' => "/^-?[0-9]{1,2}\.[0-9]{7}$/",
    'Longitude' => "/^-?[0-9]{1,2}\.[0-9]{7}$/",
    'Taille' => "/^(XS|S|M|L|XL|XXL|3XL)$/", // Size
    'Poids' => "/^[0-9]{1,6}$/", // Weight
    'Action' => "/^(REL|24R|24L|24X|DRI)$/",
    'DelaiEnvoi' => "/^-?[0-9]{2}$/", // Lead time sending
    'RayonRecherche' => "/^[0-9]{1,4}$/", // Search radius
    'TypeActivite' => "/^(\d{3},|\d{3})*$/", // Activity type
];