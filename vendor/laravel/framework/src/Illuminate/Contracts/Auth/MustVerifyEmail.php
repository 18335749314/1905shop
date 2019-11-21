<?php

namespace Illuminate\Contracts\Auth;

interface MustVerifyEmail
{
    /**
     * Determine if the user has verified their email order.
     *
     * @return bool
     */
    public function hasVerifiedEmail();

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified();

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification();

    /**
     * Get the email order that should be used for verification.
     *
     * @return string
     */
    public function getEmailForVerification();
}
