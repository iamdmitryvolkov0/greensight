<?php

namespace Logs;
interface MakeLogInterface
{
    public function makeLog(array $errors): void;
}