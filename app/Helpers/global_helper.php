<?php

function getCompanyProfile()
{
    $db = \Config\Database::connect();
    $query = $db->table('company_profile')->where('is_deleted', 0)->get()->getFirstRow();
    return $query;
}
