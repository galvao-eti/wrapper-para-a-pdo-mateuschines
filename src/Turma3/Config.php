<?php

	namespace Turma3;

	class Config{
		
		public $tipo, $host, $porta, $base, $usuario, $senha;
		
		public function __construct($tipo, $host, $porta, $base, $usuario, $senha)
		{
			$this->tipo = $tipo;
			$this->host = $host;
			$this->porta = $porta;
			$this->base = $base;
			$this->usuario = $usuario;
			$this->senha = $senha;
		}
		
	}