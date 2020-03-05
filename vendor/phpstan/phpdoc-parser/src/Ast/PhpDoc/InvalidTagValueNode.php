<?php declare(strict_types = 1);

namespace PHPStan\PhpDocParser\Ast\PhpDoc;

class InvalidTagValueNode implements PhpDocTagValueNode
{

	/** @var string (may be empty) */
	public $value;

	/** @var \PHPStan\PhpDocParser\Parser\ParserException */
	public $exception;

	public function __construct(string $value, \PHPStan\PhpDocParser\Parser\ParserException $exception)
	{
		$this->value = $value;
		$this->exception = $exception;
	}


	public function __toString(): string
	{
		return $this->value;
	}

}
