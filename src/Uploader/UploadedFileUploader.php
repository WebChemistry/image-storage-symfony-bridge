<?php declare(strict_types = 1);

namespace WebChemistry\Image\Bridge\Symfony\Uploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use WebChemistry\ImageStorage\Uploader\UploaderInterface;

final class UploadedFileUploader implements UploaderInterface
{

	private UploadedFile $uploadedFile;

	public function __construct(UploadedFile $uploadedFile)
	{
		$this->uploadedFile = $uploadedFile;
	}

	public function save(string $path, string $name): void
	{
		$this->uploadedFile->move($path . $name);
	}

	public function getContent(): string
	{
		return file_get_contents($this->uploadedFile->getFilename());
	}

}
