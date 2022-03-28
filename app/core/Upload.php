<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

namespace ShopGame\core;

class Upload
{
    private array $upload;
    private array $allowed;
    private int $maxSize;
    private string $path;
    private string $error = '';

    public function __construct($upload)
    {
        $this->upload = $upload;
    }

    public function allowed(array $allowed): Upload
    {
        $this->allowed = $allowed;
        return $this;
    }

    public function maxSize(int $maxSize): Upload
    {
        $this->maxSize = $maxSize;
        return $this;
    }

    public function path(string $path): Upload
    {
        $this->path = $path;
        return $this;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function upload(): string
    {
        $imagePath = '';

        if ($this->upload['error'] == 0) {
            if ($this->upload['size'] > $this->maxSize) {
                $this->error = 'File không được lớn hơn ' . $this->maxSize . ' byte';
            } else if (!in_array($this->upload['type'], $this->allowed)) {
                $this->error = 'File không được phép upload';
            } else {
                $storageImgPath = $this->path . '/storage/images/';
                if (!file_exists($storageImgPath)) {
                    mkdir($storageImgPath, 0755, true);
                }

                $imageName = time() . '_' . str_random(10) . '.' . pathinfo($this->upload['name'], PATHINFO_EXTENSION);
                $imagePath = $storageImgPath . $imageName;

                if (!move_uploaded_file($this->upload['tmp_name'], $imagePath)) {
                    $this->error = 'Lỗi upload hình ảnh';
                } else {
                    $imagePath = '/storage/images/' . $imageName;
                }
            }
        } else {
            $this->error = 'Lỗi upload hình ảnh';
        }

        return $imagePath;
    }
}
