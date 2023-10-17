<?php

class ErrorView {
    public static function showError($message) {
        require_once './templates2/errors.phtml';
    }
}