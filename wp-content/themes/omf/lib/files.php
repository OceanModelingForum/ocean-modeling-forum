<?php

/**
 * Convert mime types to human form.
 *
 * @return array
 */
function get_icon()
{
    $mime_table = array(

        // Text formats
        'text/plain'                    => 'Text',
        'text/csv'                      => 'CSV',

        // Misc application formats
        'application/pdf'               => 'PDF',

        // MS Office formats
        'application/msword'            => 'Word',
        'application/vnd.ms-powerpoint' => 'Powerpoint',
        'application/vnd.ms-excel'      => 'Excel',
    );
}

/**
 * Return file size in nice units.
 *
 * @return string
 */
function format_size_units($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}
