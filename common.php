<?php
require('config.php');
/*if (isset($_REQUEST['travel_mode'])) {
    save_search_results();
}*/

// total sales per cities

function TotalSales()
{
    global $database;
    $result = $database->query("select city_name, orders_cnt from cities");
    $array = array();
    $colors = array('color: #C45750', 'color: #E8C3BA', 'color: #3BBA9F', 'color: #8D5EA2'
    , 'color: #3E94CD', 'color: #C45750', 'color: #C45750', 'color: #E8C3BA', 'color: #3BBA9F', 'color: #8D5EA2'
    , 'color: #3E94CD', 'color: #C45750');

    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $key => $item) {
            $array[] = array($item['city_name'], $item['orders_cnt'], $colors[$key]);
        }
    }

    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

// total sales for services per cities

function TotalSalesServices($city_id = NULL)
{
    global $database;
    $where = "";
    $array = array();

    if (!empty($city_id)) {
        $where .= " AND services.city_id = '{$city_id}' ";
    }

    $result = $database->query(" SELECT service_name , orders_cnt from services where 1 = 1 $where ");

    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $key => $item) {
            $array['services'][$key] = $item['service_name'];
            $array['orders_cnt'][$key] = $item['orders_cnt'];
        }
    }
    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function TotalOrdersQuestions($city_id = NULL)
{
    global $database;
    $where = "";
    $array = array();

    if (!empty($city_id)) {
        $where .= " cities.id = '{$city_id}' ";
    }
    $result = $database->query(" select city_name,orders_cnt, questions_cnt from cities $where ");
    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $array[] = array($item['city_name'], $item['orders_cnt'], $item['questions_cnt']);
        }
    }

    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function ServiceQualityVote($city_id = NULL)
{
    global $database;
    $where = " ";
    $array = array();

    if (!empty($city_id)) {
        $where .= " votes.city_id = '{$city_id}' ";
    }
    $result = $database->query("select vote_name, cnt from votes  where  vote_type = 1 $where ");
    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $array[] = array($item['vote_name'], $item['cnt']);
        }
    }

    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function TeamSatisfyVote($city_id = NULL)
{
    global $database;
    $where = " ";
    $array = array();

    if (!empty($city_id)) {
        $where .= " votes.city_id = '{$city_id}' ";
    }
    $result = $database->query("  select  vote_name, cnt from votes  where vote_type = 2 $where");
    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $array[] = array($item['vote_name'], $item['cnt']);
        }
    }
    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function AccurateDateVote($city_id = NULL)
{
    global $database;
    $where = " ";
    $array = array();

    if (!empty($city_id)) {
        $where .= " votes.city_id = '{$city_id}' ";
    }
    $result = $database->query(" select  vote_name, cnt from votes  where vote_type = 3  $where");
    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $array[] = array($item['vote_name'], $item['cnt']);
        }
    }

    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function OrderAgainVote($city_id = NULL)
{
    global $database;
    $where = " ";
    $array = array();

    if (!empty($city_id)) {
        $where .= " votes.city_id = '{$city_id}' ";
    }
    $result = $database->query(" select  vote_name, cnt from votes  where vote_type = 4 $where");
    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $array[] = array($item['vote_name'], $item['cnt']);
        }
    }
    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function TotalOrdersFromSocial($city_id = NULL)
{
    global $database;
    $where = " ";

    if (!empty($city_id)) {
        $where .= " sp.city_id = '{$city_id}' ";
    }
    $result = $database->query("select social_name, cnt  from social_platforms sp $where ");
    $array = array();
    if ($result !== FALSE) {
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $array[] = array($item['social_name'], $item['cnt']);
        }
    }

    return json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

// social_media
/*
 * End of common.php
 */