<?php
// Define a secure key and IV
// Usually, you should store these securely and not hard-code them in your script
$key = openssl_random_pseudo_bytes(32); // 256 bit key
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

function encrypt($data, $key, $iv) {
    return openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
}

function decrypt($data, $key, $iv) {
    return openssl_decrypt($data, 'aes-256-cbc', $key, 0, $iv);
}

// Test the encryption and decryption
$originalData = "Hello, this is a secret message!";
$encrypted = encrypt($originalData, $key, $iv);
$decrypted = decrypt($encrypted, $key, $iv);

echo "Original: $originalData"."<br/>";
echo "Encrypted: $encrypted"."<br/>";
echo "Decrypted: $decrypted"."<br/>";
?>
