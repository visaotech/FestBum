<?php 
/*
 * Criptografia.php
 * 
 * Copyright 2024 Cleber Silva de Oliveira <cleber@ifsp.edu.br> 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 * 
 */
namespace app\core;
 
class Criptografia {

	private $chave; // Define a chave secreta (ex.: "minha_chave_de_32_bytes_para_AES-256")
	// A chave é uma sequência de bytes (ou bits) usada junto com o algoritmo de criptografia para transformar dados em um formato cifrado (criptografado). Somente quem possui a chave correta pode reverter esse processo e descriptografar os dados.
	
	private $cipher; // Define o método de criptografia (ex.: "AES-256-CBC")
	// $cipher indica o tipo exato de algoritmo a ser usado, por exemplo, "AES-128-CBC". Isso ajuda a clarificar que essa variável controla o método de cifragem ou cifra aplicada aos dados.
	
	public function __construct($chave, $cipher = self::AES_256_CBC) {
		// Verifica se a extensão OpenSSL está instalada
		if (!extension_loaded('openssl')) {
			$os = PHP_OS_FAMILY;
			$mensagemErro = "A extensão OpenSSL não está instalada.";
			
			if ($os === 'Windows') {
				$mensagemErro .= " Para instalar no XAMPP, ative o OpenSSL no php.ini. "
						. "Vá até o arquivo php.ini (geralmente em C:\\xampp\\php\\php.ini), "
								. "encontre a linha ';extension=openssl' e remova o ponto e vírgula ';' para ativá-la. "
										. "Em seguida, reinicie o Apache pelo XAMPP Control Panel.";
			} elseif ($os === 'Linux') {
				$mensagemErro .= " Para instalar no Debian, execute:\n"
						. "sudo apt update && sudo apt install php-openssl\n"
								. "Em seguida, reinicie o servidor web com:\n"
										. "sudo systemctl restart apache2 (ou nginx).";
			}
			
			throw new \Exception($mensagemErro);
		}
		
		// Verifica se o modo de criptografia selecionado é suportado
		if (!in_array($cipher, openssl_get_cipher_methods())) {
			$modosDisponiveis = implode(", ", openssl_get_cipher_methods());
			throw new \InvalidArgumentException("Modo de criptografia não suportado: $cipher. "
					. "Os modos suportados são: $modosDisponiveis");
		}
		
		$this->chave = $chave;
		$this->cipher = $cipher;
	}
	
	// Método para criptografar os dados
	public function criptografar($dados) {
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
		$dadosCriptografados = openssl_encrypt($dados, $this->cipher, $this->chave, 0, $iv);
		return base64_encode($iv . $dadosCriptografados);
	}
	
	// Método para descriptografar os dados
	public function descriptografar($dados) {
		$dados = base64_decode($dados);
		$ivLength = openssl_cipher_iv_length($this->cipher);
		$iv = substr($dados, 0, $ivLength);
		$dadosCriptografados = substr($dados, $ivLength);
		return openssl_decrypt($dadosCriptografados, $this->cipher, $this->chave, 0, $iv);
	}

	
	/*
	 Os tamanhos de bloco são geralmente 16 bytes para AES e 8 bytes para modos de wrap.
	 A relação entre tamanho da chave e tempo de processamento é aproximada; tempos maiores refletem chaves maiores ou operações adicionais, como autenticação.
	 */
	
	// AES-128 - Chave: 128 bits (16 bytes), Bloco: 128 bits (16 bytes), Tempo: 1 (Padrão)
	const AES_128_CBC = 'aes-128-cbc'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1
	const AES_128_CBC_CTS = 'aes-128-cbc-cts'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1.1
	const AES_128_CBC_HMAC_SHA1 = 'aes-128-cbc-hmac-sha1'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1.2
	const AES_128_CBC_HMAC_SHA256 = 'aes-128-cbc-hmac-sha256'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1.3
	const AES_128_CCM = 'aes-128-ccm'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1.1
	const AES_128_CFB = 'aes-128-cfb'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1
	const AES_128_CFB1 = 'aes-128-cfb1'; // Chave: 16 bytes, Bloco: 1 byte, Tempo: 1.1
	const AES_128_CFB8 = 'aes-128-cfb8'; // Chave: 16 bytes, Bloco: 8 bytes, Tempo: 1.1
	const AES_128_CTR = 'aes-128-ctr'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 0.9
	const AES_128_ECB = 'aes-128-ecb'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 0.8
	const AES_128_GCM = 'aes-128-gcm'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1
	const AES_128_OCB = 'aes-128-ocb'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1
	const AES_128_OFB = 'aes-128-ofb'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1
	const AES_128_SIV = 'aes-128-siv'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1.2
	const AES_128_WRAP = 'aes-128-wrap'; // Chave: 16 bytes, Bloco: 8 bytes, Tempo: 1.1
	const AES_128_WRAP_INV = 'aes-128-wrap-inv'; // Chave: 16 bytes, Bloco: 8 bytes, Tempo: 1.1
	const AES_128_WRAP_PAD = 'aes-128-wrap-pad'; // Chave: 16 bytes, Bloco: 8 bytes, Tempo: 1.1
	const AES_128_WRAP_PAD_INV = 'aes-128-wrap-pad-inv'; // Chave: 16 bytes, Bloco: 8 bytes, Tempo: 1.1
	const AES_128_XTS = 'aes-128-xts'; // Chave: 16 bytes, Bloco: 16 bytes, Tempo: 1.1
	
	// AES-192 - Chave: 192 bits (24 bytes), Bloco: 128 bits (16 bytes), Tempo: 1.3 (chave maior que 128)
	const AES_192_CBC = 'aes-192-cbc'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.3
	const AES_192_CBC_CTS = 'aes-192-cbc-cts'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.35
	const AES_192_CCM = 'aes-192-ccm'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.35
	const AES_192_CFB = 'aes-192-cfb'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.3
	const AES_192_CFB1 = 'aes-192-cfb1'; // Chave: 24 bytes, Bloco: 1 byte, Tempo: 1.35
	const AES_192_CFB8 = 'aes-192-cfb8'; // Chave: 24 bytes, Bloco: 8 bytes, Tempo: 1.35
	const AES_192_CTR = 'aes-192-ctr'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.2
	const AES_192_ECB = 'aes-192-ecb'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.1
	const AES_192_GCM = 'aes-192-gcm'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.3
	const AES_192_OCB = 'aes-192-ocb'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.3
	const AES_192_OFB = 'aes-192-ofb'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.3
	const AES_192_SIV = 'aes-192-siv'; // Chave: 24 bytes, Bloco: 16 bytes, Tempo: 1.4
	const AES_192_WRAP = 'aes-192-wrap'; // Chave: 24 bytes, Bloco: 8 bytes, Tempo: 1.35
	const AES_192_WRAP_INV = 'aes-192-wrap-inv'; // Chave: 24 bytes, Bloco: 8 bytes, Tempo: 1.35
	const AES_192_WRAP_PAD = 'aes-192-wrap-pad'; // Chave: 24 bytes, Bloco: 8 bytes, Tempo: 1.35
	const AES_192_WRAP_PAD_INV = 'aes-192-wrap-pad-inv'; // Chave: 24 bytes, Bloco: 8 bytes, Tempo: 1.35
	
	// AES-256 - Chave: 256 bits (32 bytes), Bloco: 128 bits (16 bytes), Tempo: 1.6 (chave maior que 192)
	const AES_256_CBC = 'aes-256-cbc'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.6
	const AES_256_CBC_CTS = 'aes-256-cbc-cts'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.65
	const AES_256_CBC_HMAC_SHA1 = 'aes-256-cbc-hmac-sha1'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.7
	const AES_256_CBC_HMAC_SHA256 = 'aes-256-cbc-hmac-sha256'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.8
	const AES_256_CCM = 'aes-256-ccm'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.65
	const AES_256_CFB = 'aes-256-cfb'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.6
	const AES_256_CFB1 = 'aes-256-cfb1'; // Chave: 32 bytes, Bloco: 1 byte, Tempo: 1.65
	const AES_256_CFB8 = 'aes-256-cfb8'; // Chave: 32 bytes, Bloco: 8 bytes, Tempo: 1.65
	const AES_256_CTR = 'aes-256-ctr'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.5
	const AES_256_ECB = 'aes-256-ecb'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.4
	const AES_256_GCM = 'aes-256-gcm'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.6
	const AES_256_OCB = 'aes-256-ocb'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.6
	const AES_256_OFB = 'aes-256-ofb'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.6
	const AES_256_SIV = 'aes-256-siv'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.8
	const AES_256_WRAP = 'aes-256-wrap'; // Chave: 32 bytes, Bloco: 8 bytes, Tempo: 1.7
	const AES_256_WRAP_INV = 'aes-256-wrap-inv'; // Chave: 32 bytes, Bloco: 8 bytes, Tempo: 1.7
	const AES_256_WRAP_PAD = 'aes-256-wrap-pad'; // Chave: 32 bytes, Bloco: 8 bytes, Tempo: 1.7
	const AES_256_WRAP_PAD_INV = 'aes-256-wrap-pad-inv'; // Chave: 32 bytes, Bloco: 8 bytes, Tempo: 1.7
	const AES_256_XTS = 'aes-256-xts'; // Chave: 32 bytes, Bloco: 16 bytes, Tempo: 1.6
	
}



/*Exemplo de Uso:
	$chave = "palavra_chave_secreta_c_32_bytes";
	$cipher = Criptografia::AES_256_CBC;
	$criptografia = new Criptografia($chave, $cipher);
	$texto = "O Texto que será encriptado!";
	$texto_encriptado = $criptografia->criptografar($texto);
	echo $texto . " [ antes de encriptar ]\n<br>";
	echo $texto_encriptado . " [ já encriptado ]\n<br>";
	$texto_reconstituido = $criptografia->descriptografar($texto_encriptado);
	echo $texto_reconstituido . " [ recuperado ]\n<br>";
*/


