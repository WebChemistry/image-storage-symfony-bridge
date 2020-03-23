<?php declare(strict_types = 1);

namespace WebChemistry\Image\Bridge\Symfony\Image;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use WebChemistry\Image\Bridge\Symfony\Uploader\UploadedFileUploader;
use WebChemistry\ImageStorage\Entity\StorableImage;
use WebChemistry\ImageStorage\Scope\Scope;

final class SymfonyStorableImage extends StorableImage
{

	public function __construct(UploadedFile $file, ?string $name = null, ?Scope $scope = null)
	{
		parent::__construct(new UploadedFileUploader($file), $name ?? $file->getBasename(), $scope);
	}

}
