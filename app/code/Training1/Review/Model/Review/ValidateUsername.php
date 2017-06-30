<?php

namespace Training1\Review\Model\Review;

use Magento\Review\Model\Review;

class ValidateUsername
{
    public function afterValidate(Review $review, $errors) {
        if (strpos($review->getNickname(), '-') !== false) {
            $errorMessage = __('Nickname cannot contain dashes.');
            if (is_array($errors)) {
                $errors[] = $errorMessage;
            } else {
                $errors = array($errorMessage);
            }
        }
        return $errors;
    }
}
