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

    public function allowed(array $allowed)
    {
        $this->allowed = $allowed;
        return $this;
    }

    public function maxSize(int $maxSize)
    {
        $this->maxSize = $maxSize;
        return $this;
    }

    public function path(string $path)
    {
        $this->path = $path;
        return $this;
    }

    public function getError()
    {
        return $this->error;
    }

    public function upload()
    {
        if ($this->upload['error'] == 0) {
            if ($this->upload['size'] > $this->maxSize) {
                $this->error = 'File không được lớn hơn ' . $this->maxSize . ' byte';
            } else if (!in_array($this->upload['type'], $this->allowed)) {
                $this->error = 'File không được phép upload';
            } else {
                $imageName = time() . '-' . $this->upload['name'];
                $imagePath = $this->path . '/storage/images/' . $imageName;

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

    public function getFullPath()
    {
        return $this->path . $this->upload['name'];
    }
}
