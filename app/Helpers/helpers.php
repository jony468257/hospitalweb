<?php

if (!function_exists('trans_field')) {
    /**
     * Get translated field based on current locale
     * Falls back to English if Bangla is not available
     *
     * @param object $model
     * @param string $field
     * @return mixed
     */
    function trans_field($model, string $field)
    {
        $locale = app()->getLocale();
        
        // If current locale is Bangla, try to get Bangla field
        if ($locale === 'bn') {
            $bnField = $field . '_bn';
            if (isset($model->$bnField) && !empty($model->$bnField)) {
                return $model->$bnField;
            }
        }
        
        // Fallback to English field
        return $model->$field ?? '';
    }
}
